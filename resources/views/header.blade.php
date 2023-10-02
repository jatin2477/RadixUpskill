<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radix Upskill</title>
    <!-- Add Bootstrap 4 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('resources/css/app.css')}}">
</head>
<style>
#wrapper {    
    width: 100vw;
    height: 100vh;
}

#wrapper #sidebar {
    width: 18%;
    border-right: 2px solid #007bff;
}

#sidebar .sidebar-heading {
    padding: 30px;
    text-align: center;
    font-size: 24px;
}

#wrapper .content {
    width: 80%;
    margin-left: 5px;
    padding-top: 70px;
}

.content .card-header {
    text-align: left;
    font-size: 20px;
    font-weight: 600;
}

.content #employeeTable {
    width: 100%;
}

/* Custom CSS for Dashboard */

/* Center-align the heading */
h1 {
    text-align: center;
}

/* Add spacing between sections */
.mt-4 {
    margin-top: 1.5rem;
}

/* Style the cards */
.card {
    border: none;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card strong {
    font-size: 30px !important;
}

/* Style the card titles */
.card-title {
    font-size: 1.5rem;
}

/* Style the card content text */
.card-text {
    font-size: 1.2rem;
}

/* Background and text colors for the Department and Employee cards */
.bg-info {
    background-color: #007bff !important; /* Blueish color */
}

.bg-success {
    background-color: #007bff !important; /* Green color */
}

/* Text color for the card content */
.text-white {
    color: #fff; /* White text */
}

.card-body label {
    text-align: left !important;
}

</style>
<body>


<!-- <div class="sidebar">
    <h2 class="text-center my-4">ADMIN</h2>
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
</div> -->

<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-primary text-white" id="sidebar">
    <div class="sidebar-heading">
        <strong>Hello, Admin</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{url(route('company.dashboard'))}}" class="nav-link">
                <i class="fa fa-tachometer mr-2"></i> Dashboard
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{url(route('employees.view'))}}" class="nav-link">
                <i class="fa fa-users mr-2"></i> Employee
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{url(route('departments.view'))}}" class="nav-link">
                <i class="fa fa-building mr-2"></i> Department
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{url(route('logout'))}}" class="nav-link">
                <i class="fa fa-sign-out mr-2"></i> Logout
            </a>
        </li>
    </ul>
</div>
