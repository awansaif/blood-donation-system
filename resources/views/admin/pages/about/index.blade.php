@extends('admin.layout.admin')


@section('content')
<main class="c-main">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <strong>About</strong> <small>Add</small>
            </div>
            <form action="{{ Route('admin.about.store') }}" method="post">
                @csrf
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">About</label>
                                <textarea class="form-control" name="about" type="text" placeholder="About Us"
                                    rows="16">{{ $about? $about->about  : old('name') }}</textarea>
                            </div>
                            @error('about')
                            <p class=" text-danger">{{ $message }}</p>
                            @enderror
                        </div>
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
    </div>
</main>
@endsection
