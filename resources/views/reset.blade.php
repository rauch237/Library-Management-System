<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        @csrf
        <p>We will send a password reset link to your email, Submit and Check Mail !</p>
        <label for="email" style="margin-bottom: 5px;">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required style="padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
    
        <button type="submit" style="padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Request reset link</button>
    </form>
    
</body>
</html>