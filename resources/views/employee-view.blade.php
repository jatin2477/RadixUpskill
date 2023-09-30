@include('header')
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
                                    <th>#</th>
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
@include('footer')  