<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Dineary</title>
</head>
<body>
    <h1>Login Admin</h1>
    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>