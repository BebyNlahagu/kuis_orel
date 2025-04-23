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
            <form id="kuisForm" action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mapel">Materi</label>
                        <input type="text" name="mapel" id="mapel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="video">Materi</label>
                        <input type="file" class="form-control" name="video" id="video" >
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

@foreach ($materi as $ma)
<div class="modal fade" id="Edit{{ $ma->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah/Edit Kuis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="kuisForm" action="{{ route('materi.update', $ma->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <input type="text" name="mapel" id="mapel" value="{{ $ma->mapel }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas" value="{{ $ma->kelas }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input type="file" name="video" id="video" value="{{ $ma->materi }}"
                            class="form-control">
                    </div>

                    @if ($ma->video)
                        <video width="320" height="240" controls>
                            <source src="{{ asset('storage/videos/' . $ma->video) }}" type="video/mp4">
                        </video>
                    @endif
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
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#tambah"
                            data-toggle="modal"> <i class="zmdi zmdi-plus"></i>add item</button>
                    </div>
                </div>
                <div class="table table-responsive m-b-40">
                    <table class="table table-borderless data-table table-data3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Materi</th>
                                <th>Kelas</th>
                                <th>Video Pembelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($materi as $ma)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $ma->mapel }}</td>
                                    <td>{{ $ma->kelas }}</td>
                                    <td><a href="{{ asset('storage/videos/' . $ma->video) }}" target="_blank">
                                        Lihat Video
                                    </a></td> 
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('materi.edit', $ma->id) }}" class="item"
                                                data-toggle="modal" data-target="#Edit{{ $ma->id }}">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <form action="{{ route('materi.destroy', $ma->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="item" data-toggle="tooltip" data-placement="top"title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


