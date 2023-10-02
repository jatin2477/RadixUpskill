<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <form action="{{$url}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Enter your name" value="{{!empty($user) ? $user->name : ''}}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Enter email" value="{{!empty($user) ? $user->email : ''}}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="contact" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" id="contact" name="contact" placeholder="Enter contact" value="{{!empty($user) ? $user->contact : ''}}">
                            @if($errors->has('contact'))
                                <div class="invalid-feedback">{{ $errors->first('contact') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" placeholder="Enter address" value="{{!empty($user) ? $user->address : ''}}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="department">Select department</label>
                            <select name="department" id="department" class="form-control">                                
                                @foreach($departments as $department)
                                    @if( !empty($user) && $department->id == $user->department_id)                                        
                                        <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if(empty($user))
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block">{{ $title }}</button>
                        
                    </form>
                    @if(is_null($user))
                        <div class="mt-3">
                            <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
