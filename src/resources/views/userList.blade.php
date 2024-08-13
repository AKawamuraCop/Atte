@extends('layouts.app')

@section('css')
<link rel='stylesheet' href="{{ asset('css/userList.css') }}">
@endsection

@section('content')
<div class="content">
    <h2 class="content__heading">ユーザー一覧</h2>
    <table class = "user__list">
        <tr class="user__list-row">
            <th class="user__list-label">ユーザーID</th>
            <th class="user__list-label">ユーザー名</th>
            <th class="user__list-label">メールアドレス</th>
            <th class="user__list-label">登録日時</th>
            <th class="user__list-label">月別勤怠表</th>
        </tr>
        @foreach($users as $user)
        <tr class="user__list-row">
            <td class="user__list-item">{{ $user->id }}</td>
            <td class="user__list-item">{{ $user->name }}</td>
            <td class="user__list-item">{{ $user->email }}</td>
            <td class="user__list-item">{{ $user->created_at }}</td>
            <td class="user__list-item">
                <form action="/monthlyAttendance" method="get">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input class="user_detail" type="submit" value="詳細">
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
</div>
@endsection