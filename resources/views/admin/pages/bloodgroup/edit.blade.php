@extends('admin.layout.admin') @section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.bloodgroup.index') }}" class="btn btn-secondary mb-2 float-right">Back</a>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong>Blood Group</strong> <small>Update</small>
            </div>
            <form action="{{ Route('admin.bloodgroup.update', $group->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Enter city name" value="{{ $group->name  }}">
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success float-right">Update</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>
@endsection
