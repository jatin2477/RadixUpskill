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
            background-color: #1A233A; /* New color for the sidebar */
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
            <a class="nav-link" href="{{url(route('departments.view'))}}">Department</a>
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
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="card-title">Number of Departments</h5>
                <p class="card-text">{{ $departmentCount }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="card-title">Number of Employees</h5>
                <p class="card-text">{{ $empCount }}</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>