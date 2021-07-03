@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.organization.index') }}" class="btn btn-secondary mb-2 float-right">Back</a>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong>Organization</strong>
                <small>Update</small>
            </div>
            <form action="{{ Route('admin.organization.update', $org->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Organization Name"
                            value="{{ $org->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Registration Number</label>
                        <input class="form-control" id="registration_number" name="registration_number" type="text"
                            placeholder="Organization registration_number" value="{{ $org->registration_number }}">
                        @error('registration_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="name">Logo</label>
                        <input class="form-control" id="logo" name="logo" type="file" placeholder="Organization Logo"
                            accept="image/*">
                        @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Address</label>
                        <input class="form-control" id="address" name="address" type="address"
                            placeholder="Organization address" value="{{ $org->address }}">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" id="email" name="email" type="email"
                            placeholder="Organization email" value="{{ $org->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Mobile</label>
                        <input class="form-control" id="mobile" name="mobile" type="text"
                            placeholder="Organization mobile" value="{{ $org->mobile }}">
                        @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input class="form-control" id="Password" name="Password" type="password"
                            placeholder="Organization Password" value="{{ old('Password') }}">
                        @error('Password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="form-control custom-select">
                            <option value="1" {{ $org->status? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $org->status? '' : 'selected' }}>Deactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
</main>
@endsection
