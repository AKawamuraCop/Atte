<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\TimeRecord;
use Carbon\Carbon;


class RecordController extends Controller
{

    public function record()
    {
        $user = Auth::user();
        $categories = Category::all();
        $today = Carbon::now()->toDateString();

        // 現在のステータスを取得
        $status = TimeRecord::where('user_id', $user->id)
            ->whereDate('clock_in', $today)
            ->get();

        foreach($categories as $category)
        {
            $category-> disabled = false; //デフォルト

            if ($category->id == 1 && $status->contains('category_id', 1)) {
                $category->disabled = true; // 出勤開始ボタンを非活性
            }

            if ($category->id == 3) {
                $break_start_count = $status->where('category_id', 3)->count();
                $break_end_count = $status->where('category_id', 4)->count();
                if ($break_start_count > $break_end_count) {
                    $category->disabled = true; // 休憩開始ボタンを非活性
                }
            }

            if ($category->id == 2 && $status->contains('category_id', 2)) {
                $category->disabled = true; // 出勤終了ボタンを非活性
                // 全てのボタンを非活性
                foreach ($categories as $cat) {
                    $cat->disabled = true;
                }
                break;
            }
        }

        return view('record', compact('user','categories'));
    }

    public function store(Request $request)
    {
        $currentTime = Carbon::now();
        $request->merge(['clock_in' => $currentTime]);

        TimeRecord::create(
            $request->only([
                'user_id',
                'category_id',
                'clock_in'
            ])
        );

        return redirect('/')->withInput();
    }

    public function search(Request $request)
    {
        // 今日の日付
        if (!$request->has('date')) {
            $date = Carbon::now()->toDateString();
        }
        else {
            $date = Carbon::parse($request->input('date'));
            // ボタンの識別子に基づいて日付を変更
            if ($request->input('action') == 'previous') {
                $date = $date->subDay()->toDateString();
            }
            elseif ($request->input('action') == 'next') {
                $date = $date->addDay()->toDateString();
            }
            else {
                $date = $date->toDateString();
            }
        }
        $query = User::query();
        $users = $query->paginate(5); // ページネーションを追加

        foreach($users as $user){

            //勤務開始を取得
            $workStart = TimeRecord::where('user_id', $user->id)
                ->whereDate('clock_in', $date)
                ->where('category_id', 1)
                ->first();

            $user->work_start = $workStart ? Carbon::parse($workStart->clock_in) : null;

            //勤務終了を取得
            $workEnd = TimeRecord::where('user_id', $user->id)
                ->whereDate('clock_in', $date)
                ->where('category_id', 2)
                ->first();

            $user->work_end = $workEnd ? Carbon::parse($workEnd->clock_in): null;

            //休憩開始時間を取得
            $breakStarts = TimeRecord::where('user_id', $user->id)
                ->whereDate('clock_in', $date)
                ->where('category_id', 3)
                ->orderBy('clock_in')
                ->get();

            //休憩終了時間を取得
            $breakEnds = TimeRecord::where('user_id', $user->id)
                ->whereDate('clock_in', $date)
                ->where('category_id', 4)
                ->orderBy('clock_in')
                ->get();

            $totalBreakSeconds = 0;

            // 休憩開始と終了をペアにして合計時間を計算
            foreach ($breakStarts as $breakStart) {
                $breakEnd = $breakEnds->firstWhere('clock_in', '>', $breakStart->clock_in);
                if ($breakEnd) {
                    $totalBreakSeconds += Carbon::parse($breakEnd->clock_in)->diffInSeconds(Carbon::parse($breakStart->clock_in));
                    // 使用済みの休憩終了をリストから削除
                    $breakEnds = $breakEnds->reject(function ($item) use ($breakEnd) {
                        return $item->id == $breakEnd->id;
                    });
                }
            }

            if($totalBreakSeconds){
                $hours = intdiv($totalBreakSeconds,3600);
                $minutes = intdiv($totalBreakSeconds % 3600, 60);
                $seconds = $totalBreakSeconds % 60;
                $user->total_break_time = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            }


            //勤務時間を計算
            if ($user->work_start && $user->work_end) {
                $workedSeconds = $user->work_start->diffInSeconds($user->work_end) - $totalBreakSeconds;
                $hours = intdiv($workedSeconds,3600);
                $minutes = intdiv($workedSeconds % 3600, 60);
                $seconds = $workedSeconds % 60;
                $user->worked_hours = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            } 
            else {
            $user->worked_hours = null; // 出勤または退勤時間がない場合
            }


        }

        return view('dailyRecord', compact('users','date'));
    }
}
