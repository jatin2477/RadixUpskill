@include('header')
<div class="content">
    <div class="row justify-content-center mt-5">        
        <div class="col-md-10">
            @if(session()->has("success"))
                <p class="alert alert-success">{{session("success")}}</p>
            @endif
            @if(session()->has("error"))
                <p class="alert alert-danger">{{session("error")}}</p>
            @endif
            <div class="card">
                <div class="card-header">
                    Department List
                    <a href="{{ route('departments.add') }}" class="btn btn-success btn-sm float-right">Add Department</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('departments.destroy', $department->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')