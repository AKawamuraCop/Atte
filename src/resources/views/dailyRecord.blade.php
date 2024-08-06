@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{ asset('css/dailyRecord.css') }}">
@endsection

@section('content')
<div class="content">
    <form class = "date__form" method="get" action="/attendance">
        <div class="date-navigation">
            <button type="submit" name="action" value="previous">&lt;</button>
            <span>{{$date}}</span>
            <button type="submit" name="action" value="next">&gt;</button>
            <input type="hidden" name="date" value="{{$date}}">
        </div>
    </form>
    <table class = "record__list">
        <tr class="record__list-row">
            <th class="record__list-label">名前</th>
            <th class="record__list-label">勤務開始</th>
            <th class="record__list-label">勤務終了</th>
            <th class="record__list-label">休憩時間</th>
            <th class="record__list-label">勤務時間</th>
        </tr>
        @foreach($users as $user)
        <tr class="record__list-row">
            <td class="record__list-item">{{$user->name}}</td>
            <td class="record__list-item">{{ $user->work_start ? $user->work_start->format('H:i:s') : '未出勤' }}</td>
            <td class="record__list-item">{{ $user->work_end ? $user->work_end->format('H:i:s') : '未退勤' }}</td>
            <td class="record__list-item">{{ $user->total_break_time ? $user->total_break_time : ' ' }}</td>
            <td class="record__list-item">{{ $user->worked_hours ? $user->worked_hours : ' ' }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection