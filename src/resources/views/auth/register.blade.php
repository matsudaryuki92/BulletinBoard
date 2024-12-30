<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡単掲示板</title>
</head>
<body>
    <h2>簡単掲示板：新規登録</h2>

    <div>
        <form action="/register" method="post">
            @csrf
            <div>
                <label for="name">名前：</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name">
            </div>
             <div>
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="email">メールアドレス：</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email">
            </div>
             <div>
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="password">パスワード：</label>
                <input type="password" name="password" value="{{ old('password') }}" id="password">
            </div>
             <div>
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="password_confirmation">確認パスワード：</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation">
            </div>
             <div>
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>

            <input type="submit" value="新規登録">
        </form>
        <div>
            <form action="/login">
                <button type="submit">ログイン</button>
            </form>
        </div>
    </div>
</body>
</html>