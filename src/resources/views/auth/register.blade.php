@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading content__heading">会員登録</h2>
    <div class="register-form__inner">
        <form class="register-form__form" action="/register" method="post">
            @csrf
            <div class="register-from__group">
                <input class="register-form__input" type="text" name="name" id="name" placeholder="名前">
                <p class="register-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-from__group">
                <input class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレス">
                <p class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-from__group">
                <input class="register-form__input" type="password" name="password" placeholder="パスワード">
                <p class="register-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="register-from__group">
                <input class="register-form__input" type="password" name="password_confirmation" placeholder="確認用パスワード">
            </div>
            <input class="register-form__btn btn" type="submit" value="会員登録">
        </form>
    </div>
    <div class="login__link">
        <p class="login__link-message">アカウントをお持ちの方はこちらから</p>
        <a class="login__button-submit" href="/login">ログイン</a>
    </div>
</div>
@endsection