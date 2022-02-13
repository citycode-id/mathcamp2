@extends('layouts.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelompok Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('teacher.topic.index') }}">Daftar Topik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Siswa Terdaftar</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelompok Siswa</h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @for ($i = 1; $i < 7; $i++)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($i == 1) active @endif" id="kelompok-{{ $i }}-tab" data-toggle="pill" href="#kelompok-{{$i}}" role="tab" aria-controls="kelompok-{{ $i }}" aria-selected="true">Kelompok {{ $i }}</a>
                            </li>
                        @endfor
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <hr>
                        @foreach ($groups as $group)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="kelompok-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="kelompok-{{ $loop->iteration }}-tab">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-info btn-modal-siswa" data-id="{{ $group->id }}"><i class="fas fa-plus"></i> Siswa Baru</button>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush table-hover" id="table-{{ $loop->iteration }}" data-id="{{ $group->id }}" style="width: 100%;">
                                            <thead class="thead-light">
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Hapus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
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
    <!--Row-->

    <!-- Modal Add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="table-siswa" data-kelompok="" data-topic="{{ $id }}" style="width: 100%;">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('js-lib')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('js')
<script src="{{ asset('js/pages/kelompok-topik.js') }}"></script>
@endpush
