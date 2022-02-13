@extends('layouts.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Topik Pembelajaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="guru-dashboard.html">Home</a></li>
            <li class="breadcrumb-item"><a href="guru-topik.html">Daftar Topik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Topik</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h3 class="text-primary">{{ $topic->name }}</h3>
                            <div class="form-group">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <form class="form-inline">
                                    <input type="text" class="d-none" value="{{ $topic->id }}" name="topic_meeting">
                                    <select class="form-control form-control-sm mx-1" name="meeting" id="meeting">
                                        <option value="1" @if($topic->current_meeting == 1) selected @endif>Pertemuan 1</option>
                                        <option value="2" @if($topic->current_meeting == 2) selected @endif>Pertemuan 2</option>
                                        <option value="3" @if($topic->current_meeting == 3) selected @endif>Pertemuan 3</option>
                                        <option value="4" @if($topic->current_meeting == 4) selected @endif>Pertemuan 4</option>
                                        <option value="5" @if($topic->current_meeting == 5) selected @endif>Pertemuan 5</option>
                                    </select>
                                    <a role="button" href="{{ route('teacher.topic.group.index', ['id' => $topic->id]) }}" class="btn mx-1 btn-info"><i class="fas fa-users"></i> Kelompok</a>
                                    <a role="button" href="{{ route('teacher.discussion.index', ['id' => $topic->id]) }}" class="btn mx-1 btn-info"><i class="fas fa-comments"></i> Diskusi</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Atas --}}
                    <div class="row my-3">
                        <div class="col-6">
                            <div>
                                <h6><strong>Poin Materi Pembelajaran</strong> <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modalPoint"><i class="fas fa-pencil-alt"></i></button> </h5>
                                    <div id="editor-point-display">
                                        {!! base64_decode($topic->points) !!}
                                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <h6><strong>Tautan Referensi</strong> <button class="btn btn-sm btn-outline-warning"
                                        data-toggle="modal" data-target="#modalReferensi"><i class="fas fa-pencil-alt"></i></button> </h5>
                                    <ul class="ml-2" id="ref-list">
                                        @foreach ($topic->references as $ref)
                                            <li class="text-primary"><a href="{{ $ref->url }}" id="{{ $ref->id }}" target="_blank">{{ $ref->name }}</a></li>
                                        @endforeach
                                    </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- Pertemuan --}}
                    <div class="row mt-3">
                        <div class="col-12">
                            {{-- Nav Tab --}}
                            <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                                @foreach ($topic->meetings as $meeting)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if($loop->first) active @endif" id="pertemuan-{{ $loop->iteration }}-tab" data-id="{{ $meeting->_id }}" data-toggle="pill" href="#pertemuan-{{ $loop->iteration }}" role="tab" aria-controls="pertemuan-{{ $loop->iteration }}" aria-selected="true">Pertemuan {{ $loop->iteration }}</a>
                                </li>
                                @endforeach
                            </ul>
                            {{-- Nav Tab Content --}}
                            <div class="tab-content" id="myTabContent">
                                @foreach ($topic->meetings as $meeting)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="pertemuan-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="pertemuan-{{ $loop->iteration }}-tab">
                                    <form action="" method="post" id="form-goal-{{ $loop->iteration }}" data-id="{{ $meeting->_id }}">
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label><strong>Tujuan Pembelajaran {{ $loop->iteration }}</strong></label>
                                                    <textarea class="form-control" id="editor{{ $loop->iteration }}" name="tujuan" rows="4">{{ base64_decode($meeting->goals) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row mt-3">
                                        <!-- Table Video -->
                                        <div class="col-md-6">
                                            <div>
                                                <label><strong>Video Pembelajaran</strong> <a href="" class="btn-video-tambah">[tambah]</a></h5>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-flush" id="table-video-{{$loop->iteration}}" data-id="{{ $meeting->_id }}" style="width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Video</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Tabel Modul -->
                                        <div class="col-md-6">
                                            <div>
                                                <label><strong>Modul Pembelajaran</strong> <a href="" class="btn-module-tambah">[tambah]</a></h5>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-flush" id="table-module-{{ $loop->iteration }}" data-id="{{ $meeting->_id }}" style="width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Modul</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tugas -->
                                    <div class="row mt-3">
                                        {{-- Tugas Pribadi --}}
                                        <div class="col-6">
                                            <div>
                                                <label><strong>Tugas Pribadi</strong> <a href="" class="btn-task-tambah">[tambah]</a></label>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush" id="table-task-{{ $loop->iteration }}" data-id="{{ $meeting->_id }}" style="width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>File Tugas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- Tugas Kelompok --}}
                                        <div class="col-6">
                                            <div>
                                                <label><strong>Tugas Kelompok</strong> <a href="" class="btn-assignment-tambah">[tambah]</a></label>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush" id="table-assignment-{{ $loop->iteration }}" data-id="{{ $meeting->_id }}" style="width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>File Tugas</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabel Hasil Tugas Siswa -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <label><strong>Hasil Tugas Siswa</strong></label>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush" id="table-task-result-{{ $loop->iteration }}" data-id="{{ $meeting->_id }}" style="width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Kelas</th>
                                                            <th>Tugas Kelompok</th>
                                                            <th>Tugas Pribadi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal Poin -->
    <div class="modal fade" id="modalPoint" tabindex="-1" role="dialog" aria-labelledby="modalPointLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Poin Materi Pembelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-point">
                    <div class="modal-body">
                        <input type="text" class="d-none" name="id" value="{{ $topic->id }}">
                        <div class="form-group">
                            <textarea class="form-control" id="editor-point" name="poin" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Referensi -->
    <div class="modal fade" id="modalReferensi" tabindex="-1" role="dialog" aria-labelledby="modalReferensiLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tautan Referensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="mb-2" id="form-reference">
                        <div class="form-row">
                            <input type="text" class="d-none" name="id" value="{{ $topic->id }}">
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Nama Tautan">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="url" placeholder="URL">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-reference" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Video -->
    <div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="modalVideoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-video">
                    <div class="modal-body">
                        <input type="text" class="d-none" id="video_meeting_id" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Video">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="url" placeholder="URL Video">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Module -->
    <div class="modal fade" id="modalModule" tabindex="-1" role="dialog" aria-labelledby="modalModuleLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Modul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-module" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" class="d-none" id="module_meeting_id" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama File</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control-file" name="file" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Task -->
    <div class="modal fade" id="modalTask" tabindex="-1" role="dialog" aria-labelledby="modalTaskLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah File Tugas </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-task" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" class="d-none" id="task_meeting_id" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama File</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control-file" name="file" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Assignment -->
    <div class="modal fade" id="modalAssignment" tabindex="-1" role="dialog" aria-labelledby="modalAssignmentLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah File Tugas </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-assignment" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" class="d-none" id="assignment_meeting_id" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nama File</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control-file" name="file" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .ck-editor__editable {
        min-height: 200px;
    }
</style>
@endpush

@push('js-lib')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
@endpush

@push('js')
<script src="{{ asset('js/pages/guru-topik-detail.js') }}"></script>
<script src="{{ asset('js/pages/guru-pertemuan-1.js') }}"></script>
<script src="{{ asset('js/pages/guru-pertemuan-2.js') }}"></script>
<script src="{{ asset('js/pages/guru-pertemuan-3.js') }}"></script>
<script src="{{ asset('js/pages/guru-pertemuan-4.js') }}"></script>
<script src="{{ asset('js/pages/guru-pertemuan-5.js') }}"></script>
@endpush
