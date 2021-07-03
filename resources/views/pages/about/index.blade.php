@extends('layouts.app')

@section('title')
About
@endsection

@section('content')
<!-- about-->
<section class="projects-section bg-dark">

    <div class="container text-white mt-5 px-4 px-lg-5">
        <h2 class="text-center">About US</h2>
        <p class="text-center mt-5">{{ $about->about }}</p>


        <h2 class="text-white text-center mt-5">Team</h2>
        <br>
        <br>
        <br>
        <div class="m-2 text-center" style="display: flex; justify-content:center; flex:wrap">
            @foreach ($team as $member)
            <div class="card bg-dark p-0">
                <img src="{{ asset($member->avatar) }}" alt="" width="200px" height="200px">
                <div class="card-body">
                    <span>{{ $member->name }}</span>
                    <br>
                    <span> <em>{{ $member->designation }}</em></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
