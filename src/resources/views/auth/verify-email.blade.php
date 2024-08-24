@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/verify-email.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="container-inner">
            <h1 class="email__heading content__heading">メール送信完了</h1>
            <div class="content-text">
                <p>メールアドレスの確認が必要です。確認メールを送信しましたので、メール内のリンクをクリックして認証を完了してください。</p>
            </div>
            <div class="resent">
                <form class="resent-form" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="resent-form__btn" type="submit">確認メールを再送信</button>
                </form>
            </div>
        </div>
</div>
@endsection
