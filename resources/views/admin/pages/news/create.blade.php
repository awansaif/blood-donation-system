@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.news.index') }}" class="btn btn-secondary mb-2 float-right">Back</a>
        <br>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <strong>News</strong> <small>Add</small>
            </div>
            <form action="{{ Route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input class="form-control" id="title" name="title" type="text" placeholder="News title"
                            value="{{ old('title') }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="name">Featured Image</label>
                        <input class="form-control" id="featured_image" name="featured_image" type="file"
                            placeholder="Featured Image" accept="image/*">
                        @error('featured_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="News Description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Body</label>
                        <textarea class="form-control" id="body" name="body"
                            placeholder="News detail">{{ old('body') }}</textarea>
                        @error('body')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success float-right">Add</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
