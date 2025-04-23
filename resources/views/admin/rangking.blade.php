@extends('layouts.admin')
@section('title','Daftar Nilai')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless data-table table-data3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th style="text-align: center">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $u)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->user->name}}</td>
                                    <td style="text-align: center">{{ $u->total_skor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection