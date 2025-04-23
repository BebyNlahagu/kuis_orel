@extends('layouts.admin')
@section('title', 'Halaman Soal')

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
                <form id="kuisForm" action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kuis_id">Jenis Kuis </label>
                            <select name="kuis_id" class="form-control" id="kuis_id">
                                <option value="">-pilih-</option>
                                @foreach ($kuis as $k)
                                    <option value="{{ $k->id }}">{{ $k->jenis_kuis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan </label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_a">Pilihan A </label>
                            <input type="text" name="pilihan_a" id="pilihan_a" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_b">Pilihan B </label>
                            <input type="text" name="pilihan_b" id="pilihan_b" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_c">Pilihan C </label>
                            <input type="text" name="pilihan_c" id="pilihan_c" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pilihan_d">Pilihan B </label>
                            <input type="text" name="pilihan_d" id="pilihan_d" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <select name="jawaban_benar" class="form-control" id="jawaban_benar">
                                <option value="">-pilih-</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Pilihan B </label>
                            <input type="file" name="image" id="image" class="form-control">
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

    @foreach ($soal as $s)
        <div class="modal fade" id="Edit{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Tambah/Edit Kuis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="kuisForm" action="{{ route('soal.update', $s->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kuis_id">Jenis Kuis</label>
                                <select name="kuis_id" class="form-control" id="kuis_id">
                                    <option value="">-pilih-</option>
                                    @foreach ($kuis as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kuis_id', $s->kuis_id ?? '') == $k->id ? 'selected' : '' }}>
                                            {{ $k->jenis_kuis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan </label>
                                <input type="text" name="pertanyaan" id="pertanyaan" value="{{ $s->pertanyaan }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_a">Pilihan A </label>
                                <input type="text" name="pilihan_a" id="pilihan_a" value="{{ $s->pilihan_a }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_b">Pilihan B </label>
                                <input type="text" name="pilihan_b" id="pilihan_b" value="{{ $s->pilihan_b }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_c">Pilihan C </label>
                                <input type="text" name="pilihan_c" id="pilihan_c" value="{{ $s->pilihan_c }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pilihan_d">Pilihan D </label>
                                <input type="text" name="pilihan_d" id="pilihan_d" value="{{ $s->pilihan_d }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jawaban_benar">Jawaban Benar</label>
                                <select name="jawaban_benar" class="form-control" id="jawaban_benar">
                                    <option value="">-pilih-</option>
                                    <option value="a"
                                        {{ old('jawaban_benar', $s->jawaban_benar ?? '') == 'a' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="b"
                                        {{ old('jawaban_benar', $s->jawaban_benar ?? '') == 'b' ? 'selected' : '' }}>B
                                    </option>
                                    <option value="c"
                                        {{ old('jawaban_benar', $s->jawaban_benar ?? '') == 'c' ? 'selected' : '' }}>C
                                    </option>
                                    <option value="d"
                                        {{ old('jawaban_benar', $s->jawaban_benar ?? '') == 'd' ? 'selected' : '' }}>D
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">image </label>
                                <input type="file" name="image" id="image" class="form-control">
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
            @foreach ($kuis as $ke)
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">{{ $ke->jenis_kuis }}</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#tambah"
                                data-toggle="modal"> <i class="zmdi zmdi-plus"></i>add item</button>
                        </div>
                    </div>
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless data-table table-data3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban Benar</th>
                                    <th>Aksi</th>
                                    <th>Tambahkan Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($soal as $s)
                                    @if ($s->kuis_id == $ke->id)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $s->pertanyaan }}</td>
                                            <td>{{ $s->jawaban_benar }}</td>
                                    
                                            <td>
                                                @if ($s->image)
                                                <img src="{{ Storage::url('images/'.$s->image) }}" alt="Gambar" width="50" height="50">
                                    

                                                @endif
                                            </td>
                                            
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('soal.edit', $s->id) }}" class="item"
                                                        data-toggle="modal" data-target="#Edit{{ $s->id }}"> <i
                                                            class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <form action="{{ route('soal.destroy', $s->id) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete"> <i class="zmdi zmdi-delete"></i>
                                                           

                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
