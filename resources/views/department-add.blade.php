<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1A233A;
            /* New color for the sidebar */
            padding-top: 20px;
            color: white;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2 class="text-center my-4">Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{url(route('company.dashboard'))}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url(route('company.dashboard'))}}">Department</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url(route('employees.view'))}}">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url(route('logout'))}}">Logout</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}} Department</div>
                    <div class="card-body">
                        <form method="POST" action="{{ $url }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($department) ? $department->name : '' }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{$title}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>