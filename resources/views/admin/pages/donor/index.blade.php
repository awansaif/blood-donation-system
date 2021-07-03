@extends('admin.layout.admin') @section('content')
<main class="c-main">
    <div class="container-fluid">
        <table class="table table-responsive-sm table-hover  table-outline mb-0 ">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        <svg class="c-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                        </svg>
                    </th>
                    <th>Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Mobile</th>
                    <th class="text-center">Blood Group</th>
                    <th class="text-center">City</th>
                    <th class="text-center">DoB</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Last Donated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->blood_group }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>
                        <span class="badge badge-info">
                            {{ $user->last_donoted? $user->last_donoted : 'Not Yet' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
