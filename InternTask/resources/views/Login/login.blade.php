<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    @vite(['resources/js/app.js'])
</head>

<body>

    <h1>Login page</h1>
    @if (session('Message'))
        <div class="alert alert-success">
            {{ session('Message') }}
        </div>
    @endif

    <div class="require-error-message">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    <form action="login_process" method="post">
        <div>
            <label for="email">
                <x-tabler-mail />
                Email:</label>
            <input type="email" name="email" placeholder="Enter your Email">
        </div>
        <div>
            <label for="password">
                <x-tabler-password-user />
                Password:</label>
            <input type="password" name="password" placeholder="Enter your password">
        </div>

        <button type="submit">Login <x-tabler-lock-open /></button>
        @csrf
    </form>
</body>

</html>
