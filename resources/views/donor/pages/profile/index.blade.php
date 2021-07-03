@extends('donor.layout.donor')
@section('title')
Profile
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
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                    class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset(Auth::guard('donor')->user()->avatar) }}" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                            <span class="font-weight-bold">
                                {{ Auth::guard('donor')->user()->is_donor? 'Donor' : 'Patient' }}
                            </span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ Auth::guard('donor')->user()->name }}
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>
                            {{ Auth::guard('donor')->user()->email }}
                        </div>
                        <div>
                            <i class="ni education_hat mr-2"></i>
                            {{ Auth::guard('donor')->user()->city }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <form action="{{ Route('donor.profile.update', Auth::guard('donor')->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            <span class="font-weight-bold">
                                {{ Session::get('message') }}
                            </span>
                        </div>
                        @endif
                        <h6 class="heading-small text-muted mb-4">User Profile</h6>
                        <div class="pl-lg-4">
                            <img src="{{ asset(Auth::guard('donor')->user()->avatar) }}" alt="" width="100px"
                                height="100px" style="border-radius: 50%; overflow:hidden;">
                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <div class="form-group">
                                        <input type="file" id="input-username" class="form-control" placeholder="Name"
                                            name="avatar">
                                    </div>
                                    @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Name:</label>
                                        <input type="text" id="input-username" class="form-control" placeholder="Name"
                                            value="{{ Auth::guard('donor')->user()->name }}" name="name">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address:</label>
                                        <input type="email" id="input-email" class="form-control" placeholder="email"
                                            value="{{ Auth::guard('donor')->user()->email }}" name="email">
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
                                            placeholder="Mobile phone"
                                            value="{{ Auth::guard('donor')->user()->mobile }}" name="mobile">
                                    </div>
                                    @error('mobile')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Blood Group:</label>
                                        <select name="group" id="group" class="form-control custom-select">
                                            @foreach ($groups as $group)
                                            <option value="{{ $group->name }}"
                                                {{ $group->name == Auth::guard('donor')->user()->blood_group ? 'selected' : '' }}>
                                                {{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('group')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Date of Birth:</label>
                                        <input type="date" id="input-first-name" class="form-control"
                                            placeholder="Date of Birth" value="{{ Auth::guard('donor')->user()->dob }}"
                                            name="dob">
                                    </div>
                                    @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">City:</label>
                                        <select name="city" id="city" class="form-control custom-select">
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->name }}"
                                                {{ $city->name == Auth::guard('donor')->user()->city ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('city')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Is Donor:</label>
                                        <select name="donor" id="donor" class="form-control custom-select">
                                            <option value="1"
                                                {{ Auth::guard('donor')->user()->is_donor? 'selected' : '' }}>Donor
                                            </option>
                                            <option value="0"
                                                {{ Auth::guard('donor')->user()->is_donor? '': 'selected' }}>Patient
                                            </option>
                                        </select>
                                    </div>
                                    @error('donor')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Hide your
                                            Account:</label>
                                        <select name="status" id="status" class="form-control custom-select">
                                            <option value="1"
                                                {{ Auth::guard('donor')->user()->status? 'selected' : ''  }}>Visible
                                            </option>
                                            <option value="0"
                                                {{ Auth::guard('donor')->user()->status? '' : 'selected' }}>Hide
                                            </option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-success rounded">Update</button>
                        </div>
                        <hr class="my-4" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
