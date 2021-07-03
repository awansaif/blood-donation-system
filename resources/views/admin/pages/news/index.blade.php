@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.news.create') }}" class="btn btn-success mb-2 float-right">Add New</a>
        <table class="table table-responsive-sm table-hover  table-outline mb-0 ">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Featured Image</th>
                    <th>Title</th>
                    <th>Publish At</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                @endif
                @foreach ($news as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ asset($data->featured_image) }}" alt="" width="70px" height="70px">
                    </td>
                    <td>{{ $data->title }}</td>
                    <td>{{ date('Y, M d h:m:s a', strtotime($data->created_at)) }}</td>
                    <td>{{ $data->status? 'Live' : 'Hide' }}</td>
                    <td>
                        <a href="{{ Route('admin.news.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.news.destroy', $data->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
