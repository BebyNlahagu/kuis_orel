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
                <form id="kuisForm" action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jenis_kuis">Jenis Kuis</label>
                            <input type="text" name="jenis_kuis" id="jenis_kuis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi (Menit)</label>
                            <input type="number" class="form-control" id="durasi" name="durasi" min="1"
                                required>
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

    @foreach ($jawaban as $k)
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
                    <form id="kuisForm" action="{{ route('nilai.update', $k->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jenis_kuis">Jenis Kuis</label>
                                <input type="text" name="jenis_kuis" id="jenis_kuis" value="{{ $k->jenis_kuis }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (Menit)</label>
                                <input type="time" class="form-control" id="durasi" value="{{ $k->durasi }}"
                                    name="durasi" min="1" required>
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
    {{--  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#tambah"
                            data-toggle="modal"> <i class="zmdi zmdi-plus"></i>add item</button>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $uniqueUsers = [];
                            @endphp
                       @foreach ($jawaban as $k)
                           @if (!in_array($k->user_id, $uniqueUsers))
                               @php
                                   $uniqueUsers[] = $k->user_id;
                               @endphp
                               <tr>
                                   <td>{{ $no++ }}</td>
                                   <td>{{ \Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y') }}</td>
                                   <td>{{ $k->user->name }}</td>
                                   <td>{{ $jumlah[$k->user_id ?? 0] }}</td>
                                   <td>
                                       <div class="table-data-feature">
                                           <a href="{{ route('nilai.edit', $k->id) }}" class="item"
                                               data-toggle="modal" data-target="#Edit{{ $k->id }}">
                                               <i class="zmdi zmdi-edit"></i>
                                           </a>
                                           <form action="{{ route('nilai.destroy', $k->id) }}" method="post" enctype="multipart/form-data">
                                               @method('DELETE')
                                               @csrf
                                               <button type="submit" class="item" data-toggle="tooltip" data-placement="top"
                                                   title="Delete">
                                                   <i class="zmdi zmdi-delete"></i>
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
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>  --}}
    <!--Modal Tambah-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#tambah"
                            data-toggle="modal"> <i class="zmdi zmdi-plus"></i>add item</button>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $lastUserId = null;
                                $userJawabanCounts = [];
                            @endphp
                    
                            {{-- Hitung jumlah jawaban per siswa terlebih dahulu --}}
                            @foreach ($jawaban as $k)
                                @php
                                    $userJawabanCounts[$k->user_id] = isset($userJawabanCounts[$k->user_id]) 
                                        ? $userJawabanCounts[$k->user_id] + 1 
                                        : 1;
                                @endphp
                            @endforeach
                    
                            @php $processedUsers = []; @endphp
                    
                            @foreach ($jawaban as $k)
                                <tr>
                                    {{-- Pastikan Nama Siswa hanya muncul sekali dengan rowspan --}}
                                    @if (!in_array($k->user_id, $processedUsers))
                                        <td rowspan="{{ $userJawabanCounts[$k->user_id] }}">{{ $k->user->name }}</td>
                                        @php $processedUsers[] = $k->user_id; @endphp
                                    @endif
                                    
                                    <td>{{ $k->jawaban }}</td>
                                    <td>{{ $k->soal->pertanyaan }}</td>
                                    <td>
                                        @if ($k->jawaban_benar)
                                            <span style="color: green;">Benar</span>
                                        @else
                                            <span style="color: red;">Salah</span>
                                        @endif
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
@endsection
