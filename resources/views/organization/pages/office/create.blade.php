@extends('organization.layout.organization')
@section('title')
Office
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
                            <h3 class="mb-0">Add Office</h3>
                        </div>
                    </div>
                </div>
                <form action="{{ Route('org.office.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            <span class="font-weight-bold">
                                {{ Session::get('message') }}
                            </span>
                        </div>
                        @endif
                        <h6 class="heading-small text-muted mb-4">Office information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Address:</label>
                                        <input type="address" id="input-username" class="form-control"
                                            placeholder="Sub Office Address" value="{{ old('address') }}"
                                            name="address">
                                    </div>
                                    @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address:</label>
                                        <input type="email" id="input-email" class="form-control" placeholder="email"
                                            value="{{ old('email') }}" name="email">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Mobile:</label>
                                        <input type="text" id="input-first-name" class="form-control"
                                            placeholder="Mobile phone" value="{{ old('mobile') }}" name="mobile">
                                    </div>
                                    @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Office
                                            Head:</label>
                                        <input type="text" id="input-first-name" class="form-control"
                                            placeholder="Office Heade manager name" value="{{ old('head') }}"
                                            name="head">
                                    </div>
                                    @error('head')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">City:</label>
                                        <input type="text" id="input-first-name" class="form-control"
                                            placeholder="Office City" value="{{ old('city') }}" name="city">
                                    </div>
                                    @error('city')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-success rounded">Add</button>
                        </div>
                        <hr class="my-4" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
