@include('header')
<!-- Inside the container in your HTML -->
<div class="content">
    <h1 class="text-center">Welcome to Your Dashboard</h1>
    
    <div class="row">
        <!-- Department Count -->
        <div class="col-md-10 mx-auto mb-5 mt-5">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Departments</h5>
                    <p class="card-text">There are <strong>10</strong> departments in your organization.</p>
                </div>
            </div>
        </div>

        <!-- Employee Count -->
        <div class="col-md-10 mx-auto">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">You have <strong>50</strong> employees in your organization.</p>
                </div>
            </div>
        </div>
    </div>
</div>




@include('footer')