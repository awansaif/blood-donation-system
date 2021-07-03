@extends('layouts.app')

@section('title')
Contact
@endsection

@section('content')
<!-- contact-->
<section class="projects-section bg-dark">

    <div class="container mt-5 px-4 px-lg-5">
        <h2 class="text-center text-light mb-4">Contact Us</h2>
        <div class="w-75 m-auto">
            <form action="" class="text-light">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control mb-4" value="{{ old('name') }}" id="name"
                    placeholder="Your Name">
                <label for="name">Email:</label>
                <input type="email" name="email" class="form-control mb-4" id="name" value="{{ old('email') }}"
                    placeholder="Your email">
                <label for="name">Message:</label>
                <textarea name="message" class="form-control mb-4" id="message" placeholder="Your message"
                    rows="10">{{ old('message') }}</textarea>

                <button class="btn btn-success">Send</button>
            </form>
        </div>
    </div>
</section>
@endsection
