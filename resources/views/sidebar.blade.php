<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Bootstrap 4 Sidebar</title>
    <!-- Add Bootstrap 4 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-primary text-white" id="sidebar">
    <div class="sidebar-heading">
        <strong>My Dashboard</strong>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="#" class="nav-link">
                <i class="fa fa-tachometer mr-2"></i> Dashboard
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="nav-link">
                <i class="fa fa-users mr-2"></i> Employee
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="nav-link">
                <i class="fa fa-building mr-2"></i> Department
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="nav-link">
                <i class="fa fa-sign-out mr-2"></i> Logout
            </a>
        </li>
    </ul>
</div>

</div>
</body>
</html>
