@extends('layouts.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Diskusi Kelompok Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('teacher.topic.index') }}">Daftar Topik</a></li>
            <li class="breadcrumb-item">Topik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Diskusi Kelompok</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
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
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="kelompok-{{ $group->group }}" role="tabpanel" aria-labelledby="kelompok-{{ $group->group }}-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-primary btn-reply" data-group="{{ $group->id }}"><i class="fas fa-reply"></i> Balas</button>
                                    </div>
                                    <ul class="list-group scrollable" data-group="{{ $group->id }}">
                                        @forelse ($group->discussions as $discuss)
                                            <div class="list-group-item">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="text-primary">{{ $discuss->user->name }}</h5>
                                                    <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$discuss->created_at)->format('d-m-Y H:i:s') }}</small>
                                                </div>
                                                <p class="mb-0">{{ $discuss->message }}</p>
                                            </div>
                                        @empty
                                            <p>Belum ada Diskusi</p>
                                        @endforelse
                                    </ul>
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

    <!-- Modal Reply -->
    <div class="modal fade" id="modalReply" tabindex="-1" aria-labelledby="modalReplyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReplyLabel">Balas Diskusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-reply">
                    <div class="modal-body">
                        <input type="text" class="d-none" value="" id="group_id" name="id">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
    .scrollable {
        overflow-y: auto;
        height: 290px;
    }
</style>
@endpush

@push('js-lib')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@2.3.0/build/global/luxon.min.js"></script>
@endpush

@push('js')
<script src="{{ asset('js/pages/kelompok-diskusi.js') }}"></script>
@endpush
