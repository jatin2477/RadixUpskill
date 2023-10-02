<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            text-align: center;
        }

        .container h2 {
            margin-top: 50px;
        }

        h2 span {
            color: blue;
            font-weight: 700;
        }

        .container img {
            width: 55%;
            margin-top: 50px;
        }
        .navbar {
            padding: 10px 50px;
            font-size: 18px;
            font-weight: 500;
        }
        .navbar img{
            width: 70px;
            height: 70px;
            margin-left: 50px;
        }
        .navbar-nav {
            margin-right: 50px;
        }

        #navbarNav .nav-item {
            margin-right: 40px;
        }
        #navbarNav .nav-item:hover a {
            color: blue !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{url('/assets/images/radix_logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="Logo">
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
    <h2>Welcome to the <span>Radix</span> Upskill</h2>
    <img src="{{url('/assets/images/upskill.avif')}}" alt="" srcset="">
</div>

</body>
</html>
