<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Password Reset</h1>
    </div>
    <div class="content">
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <a class="button" href="{{ route('resetPassword', $token) }}">Reset Password</a>
        <p>If you did not request a password reset, no further action is required.</p>
    </div>
    <div class="footer">
        Regards,<br>
        {{ config('app.name') }}
    </div>
</div>

</body>
</html>
