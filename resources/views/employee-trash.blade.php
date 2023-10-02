@include('header')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Trash List
                    </div>
                    <div class="card-body">
                        <a href="{{ route('employees.view') }}" class="btn btn-primary mb-3 d-flex float-right">Employee List</a>
                        <table id="employeeTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Employee data will be populated here -->
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>
                                        <a href="{{ route('employees.restore', $employee->id) }}" class="btn btn-primary btn-sm">Restore</a>
                                        <a href="{{ route('employees.forcedelete', $employee->id) }}" class="btn btn-danger btn-sm">Force Delete</a>
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
@include('footer')    