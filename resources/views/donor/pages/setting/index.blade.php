@extends('donor.layout.donor')
@section('title')
Setting
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Setting </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Setting information</h6>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        <span class="font-weight-bold">{{ Session::get('message')  }}</span>
                    </div>
                    @endif
                    <form action="{{ Route('donor.setting.update', Auth::guard('donor')->id()) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="current_password">Current
                                            Password</label>
                                        <input type="text" id="current_password" class="form-control"
                                            placeholder="Current Password" name="current_password">
                                    </div>
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="new_password">New Password</label>
                                        <input type="password" id="new_password" class="form-control"
                                            placeholder="New Password" name="new_password">
                                    </div>
                                    @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-success rounded">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
