@extends('layouts.app')

@section('title')
Organization
@endsection

@section('content')
<!-- organization-->
<section class="projects-section bg-dark">
    <div class="container mt-5 px-4 px-lg-5">
        <div class="flex justify-content-evenly h-100 aligin-content-center"
            style="display: flex; justify-content: space-evenly; height: 50vh;">
            <div class="text-light w-50">
                <h2>Organization</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque eum fuga ut sunt iure officia
                    sint architecto ipsa fugiat, magni tempora mollitia cupiditate dicta aspernatur ipsum expedita nisi,
                    amet vel.</p>
            </div>
            <div class="text-light w-25 ml-5">
                <h2 class="text-center">Login</h2>
                <form action="{{ Route('org.login') }}" method="POST">
                    @csrf
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <label for="">Registration Number:</label>
                    <input type="text" class="form-control" placeholder="Registration #" name="registration_number"
                        value="{{ old('registration_number') }}">

                    @error('registration_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="">Password:</label>
                    <input type="password" class="form-control" placeholder="**************" name="password">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-success mt-2 p-2" style="width: 100px; height: 40px;">Login</button>
                </form>
            </div>
        </div>

        <div class="row text-white mt-5">
            @foreach ($organizations as $org)
            <div class="card bg-dark p-0 mb-2">
                <div class="card-header">
                    <div class="d-flex">
                        <div>
                            <img src="{{ asset($org->logo) }}" alt="" width="70px" height="70px">
                        </div>
                        <div class="pl-5" style="padding-left: 20px;">
                            <h2>{{ $org->name }} <em>Reg: #{{ $org->registration_number }}</em></h2>
                            <span>Head Office: {{ $org->address  }}</span>
                            <br>
                            <span>Mobile: {{ $org->mobile  }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h2>Offices:</h2>
                    <hr class="text-light">
                    <div class="row">
                        @foreach ($org->offices as $key => $office)
                        <div class="col-sm-4">
                            <div class="card bg-dark p-4">
                                <span>Office#: {{ $key + 1 }}</span>
                                <h5>City: {{ $office->city }}</h5>
                                <h6>Address: {{ $office->address }}</h6>
                                <h6>Mobile#: {{ $office->mobile }}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
