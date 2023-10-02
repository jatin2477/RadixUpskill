<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                <div class="mt-2">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                    </div>
                    <form action="{{ route('checkLogin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Enter email">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <div class="mt-3 d-flex justify-content-between">
                            <p>Don't have an account? <a href="{{ route('register') }}">Sign In</a></p>
                            <a href="{{ route('forgot-password') }}">Forgot Password?</a>
                        </div>

                    </form>
                    <div class="text-center mt-4">
                        <p>Or log in with:</p>
                        <a href="{{ route('login.facebook') }}" class="btn btn-outline-primary mr-2">Facebook</a>
                        <a href="{{ route('login.github') }}" class="btn btn-outline-secondary mr-2">GitHub</a>
                        <a href="{{ route('login.google') }}" class="btn btn-outline-danger">Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
