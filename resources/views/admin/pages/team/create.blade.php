@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.team.index') }}" class="btn btn-secondary mb-2 float-right">Back</a>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong>Team</strong> <small>Add</small>
            </div>
            <form action="{{ Route('admin.team.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Member name"
                            value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="name">Image</label>
                        <input class="form-control" id="image" name="image" type="file" placeholder="Member Image"
                            accept="image/*">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Designation</label>
                        <input class="form-control" id="designation" name="designation" type="text"
                            placeholder="Member designation" value="{{ old('designation') }}">
                        @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success float-right">Add</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
