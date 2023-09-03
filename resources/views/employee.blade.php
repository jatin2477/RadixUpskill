<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="assets/images/radix_logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
        Radix Upskill
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('update-profile')}}/{{$id}}">Update Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url(route('logout'))}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container center-content">
    <h2>Welcome to the Radix Upskill</h2>
</div>

</body>
</html>
