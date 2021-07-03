@extends('admin.layout.admin')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <a href="{{ Route('admin.organization.create') }}" class="btn btn-success mb-2 float-right">Add New</a>
        <table class="table table-responsive-sm table-hover  table-outline mb-0 ">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Name</th>
                    <th>Registration #</th>
                    <th>Logo</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mobile #</th>
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
                @foreach ($organizations as $key => $organization)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->registration_number }}</td>
                    <td>
                        <img src="{{ asset($organization->logo) }}" alt="" width="70px" height="70px">
                    </td>
                    <td>{{ $organization->address }}</td>
                    <td>{{ $organization->email }}</td>
                    <td>{{ $organization->mobile }}</td>
                    <td>{{ $organization->status? 'Active' : 'Deactive' }}</td>
                    <td>
                        <a href="{{ Route('admin.organization.edit', $organization->id) }}"
                            class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.organization.destroy', $organization->id) }}" method="post">
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
