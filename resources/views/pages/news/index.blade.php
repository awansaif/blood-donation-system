@extends('layouts.app')

@section('title')
News
@endsection

@section('content')
<!-- News-->
<section class="projects-section bg-dark" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- latest news Row-->
        <div class="row">
            <div class="col-sm-6">
                <h2 class="text-white mb-5 font-weight-bold float-left">Latest News</h2>
            </div>
        </div>
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            @foreach ($news as $data)
            <div class="col-sm-4 m-1">
                <a href="{{ Route('signleNews', $data->slug) }}">
                    <div style="position: relative;">
                        <img class="img-fluid" src="{{ asset($data->featured_image) }}" alt="..." />
                        <div class="w-100 text-center p-2" style="position: absolute; bottom:0%; left:50%; transform: translate(-50%, -0%);
                                                    background: #303030; opacity: .7;">
                            <p class="text-white">{{ $data->title }}</p>
                            <hr>
                            <h6 class="text-white">Publish at: {{ date('d M,Y', strtotime($data->created_at))  }}
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
