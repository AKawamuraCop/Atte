@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{ asset('css/monthlyRecord.css') }}">
@endsection

@section('content')
<div class="content">
    <form class = "month__form" method="get" action="/monthlyAttendance">
        <div class="month-navigation">
            <button type="submit" name="action" value="previous">&lt;</button>
            <span class="month_label">{{ $month }}</span>
            <button type="submit" name="action" value="next">&gt;</button>
            <input type="hidden" name="month" value="{{ $month }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
        </div>
    </form>
    <div class="record__heading">
        <p class="record__title">{{ $user->name }}</p>
    </div>
    <table class = "record__list">
        <tr class="record__list-row">
            <th class="record__list-label">日付</th>
            <th class="record__list-label">勤務開始</th>
            <th class="record__list-label">勤務終了</th>
            <th class="record__list-label">休憩時間</th>
            <th class="record__list-label">勤務時間</th>
        </tr>
        @foreach($monthlyWork as $workDate)
        <tr class="record__list-row">
            <td class="record__list-item">{{$workDate->date}}</td>
            <td class="record__list-item">{{ $workDate->work_start ? $workDate->work_start->format('H:i:s') : '未出勤' }}</td>
            <td class="record__list-item">{{ $workDate->work_end ? $workDate->work_end->format('H:i:s') : '未退勤' }}</td>
            <td class="record__list-item">{{ $workDate->total_break_time ? $workDate->total_break_time : ' ' }}</td>
            <td class="record__list-item">{{ $workDate->worked_hours ? $workDate->worked_hours : ' ' }}</td>
        </tr>
        @endforeach
    </table>
    {{ $monthlyWork->appends(request()->query())->links('vendor.pagination.custom') }}

</div>
@endsection