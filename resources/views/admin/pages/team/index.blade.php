@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.team.create') }}" class="btn btn-success mb-2 float-right">Add New</a>
        <table class="table table-responsive-sm table-hover  table-outline mb-0 ">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Designation</th>
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
                @foreach ($team as $key => $member)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ asset($member->avatar) }}" alt="" width="70px" height="70px">
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->designation }}</td>
                    <td>
                        <a href="{{ Route('admin.team.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.team.destroy', $member->id) }}" method="post">
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
