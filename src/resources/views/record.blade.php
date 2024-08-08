@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/record.css') }}">
@endsection

@section('content')
<div class="content">
    <h2 class="content__heading">{{ $user['name'] }}さんお疲れ様です！</h2>
    <div class="content__item">
        <form  class="content__item-form" action="/" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
            @foreach($categories as $category)
            <button class="content__item-card" name="category_id" value="{{ $category['id'] }}"   @if($category->disabled)disabled @endif >{{ $category['content']}}</button>
            @endforeach
        </form>
    </div>
</div>
@endsection