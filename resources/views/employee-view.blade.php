<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Employee List
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        <a href="{{ route('employees.trash') }}" class="btn btn-warning mb-3 d-flex float-right">Trash</a>
                        <table id="employeeTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Employee data will be populated here -->
                                <pre>
                                    {{$employees}}
                                </pre>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->contact}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->departments->first()->name}}</td>
                                    <td>
                                        <!-- <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a> -->
                                        <a href="{{ route('employees.destroy', $employee->id) }}" class="btn btn-danger btn-sm">Soft Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>    