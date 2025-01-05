@extends('layouts.auth')

@section('css')

@endsection

@section('title')
    <h2>簡単掲示板：ログイン</h2>
@endsection

@section('content')
    <div>
        <form action="/login" method="post">
            @csrf
            <div>
                メールアドレス：
                <input type="email" name="email">
            </div>
            <div>
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                パスワード：
                <input type="password" name="password">
            </div>
            <div>
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <input type="submit" value="ログイン">
        </form>
        <form action="/register">
            <button type="submit">新規登録</button>
        </form>
    </div>
@endsection