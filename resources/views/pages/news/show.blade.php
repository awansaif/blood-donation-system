@extends('layouts.app')

@section('title')
{{ $news->title }}
@endsection

@section('content')
<!-- News-->
<section class="projects-section bg-dark" id="projects">
    <img src="{{ asset($news->featured_image) }}" alt="" width="100%" height="400">
    <div class="container mt-5 px-4 px-lg-5">
        <span class="text-white text-right">Publish at: {{ date('d, M y', strtotime($news->created_at)) }}</span>
        <hr class="text-light">
        <h4 class="text-white">{{ $news->title  }}</h4>
        <p class="text-light mb-5 mt-5">
            {{ $news->description }}
        </p>

        <p class="text-light mb-5 mt-5">
            {{ $news->body }}
        </p>
    </div>
</section>
@endsection
