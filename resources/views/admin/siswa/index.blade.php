@extends('layouts.admin')

<style>
    .text-success {
    color: green;
    font-weight: bold;
}

.text-danger {
    color: red;
    font-weight: bold;
}
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>email</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $u)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
