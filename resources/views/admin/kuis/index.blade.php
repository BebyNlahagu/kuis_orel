@extends('layouts.admin')
@section('title','Halaman Kuis')
@section('modal')
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Tambah/Edit Kuis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="kuisForm" action="{{ route('kuis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jenis_kuis">Jenis Kuis</label>
                            <input type="text" name="jenis_kuis" id="jenis_kuis" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($kuis as $k)
        <div class="modal fade" id="Edit{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Tambah/Edit Kuis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="kuisForm" action="{{ route('kuis.update', $k->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis_kuis">Jenis Kuis</label>
                                <input type="text" name="jenis_kuis" id="jenis_kuis" value="{{ $k->jenis_kuis }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-right ms-auto">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#tambah"
                            data-toggle="modal"> <i class="zmdi zmdi-plus"></i>add item</button>
                    </div>
                </div>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jenis Kuis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kuis as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $k->jenis_kuis }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('kuis.edit', $k->id) }}" class="item"
                                                data-toggle="modal" data-target="#Edit{{ $k->id }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>

    <!--Modal Tambah-->
@endsection
