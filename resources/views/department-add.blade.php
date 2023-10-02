@include('header')
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
@include('footer')