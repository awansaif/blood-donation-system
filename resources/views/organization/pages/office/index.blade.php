@extends('organization.layout.organization')
@section('title')
Office
@endsection

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="float-left text-light">Offices</h2>
            <a href="{{ Route('org.office.create') }}" class="btn btn-success float-right btn-sm">Add New</a>
        </div>
        <div class="col-sm-12 table-repsonsive card">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <span class="font-weight-bold">
                    {{ Session::get('message') }}
                </span>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Head</th>
                        <th>Mobile #</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offices as $key => $office)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $office->city }}</td>
                        <td>{{ $office->address }}</td>
                        <td>{{ $office->head }}</td>
                        <td>{{ $office->mobile }}</td>
                        <td>{{ $office->email }}</td>
                        <td>
                            <a href="{{ Route('org.office.edit', $office->id) }}"
                                class="btn btn-success btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="{{ Route('org.office.destroy', $office->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
