<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('reset.password.post') }}" style="display: flex; flex-direction: column; max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email" style="margin-bottom: 5px;">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    
        <label for="password" style="margin-bottom: 5px;">New Password:</label>
        <input type="password" id="password" name="password" placeholder="New Password" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    
        <label for="password_confirmation" style="margin-bottom: 5px;">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    
        <button type="submit" style="padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Reset Password</button>
    </form>
    
</body>
</html>