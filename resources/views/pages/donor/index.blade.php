@extends('layouts.app')

@section('title')
Donors
@endsection

@section('content')
<!-- donor-->
<section class="projects-section bg-dark">

    <div class="container mt-5 px-4 px-lg-5">
        <div class="row">
            @foreach ($donors as $donor)
            <div class="col-lg-2 col-md-3 col-sm-4 p-0 card bg-dark text-center text-light m-3"
                title="{{ $donor->name }}">
                <img src="{{ File::exists($donor->avatar)? asset($donor->avatar) : asset('landing/assets/img/demo-image-01.jpg') }}"
                    alt="" width="100%" height="200px">
                <div class="card-body">
                    <span class="font-weight-bold">{{ $donor->name }}</span>
                    <br>
                    <span>{{ $donor->blood_group }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
