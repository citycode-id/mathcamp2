@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh;" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-body" style="height: 32vw">
                    <p class="card-text">Tempatkan rumus dibawah ini sesuai jenis nya masing-masing di kotak sebelah kanan.</p>
                    <div id="start" style="min-height: 50px">
                        <button type="button" class="btn btn-light m-2 1">{{ __("V = P x l x t") }}</button>
                        <button type="button" class="btn btn-light m-2 2">{{ __("V = S x S x S") }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">Balok</h5>
                </div>
                <div class="card-body">
                    <div id="dropBD" class="mx-1" style="height: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-white mb-0">Kubus</h5>
                </div>
                <div class="card-body">
                    <div id="dropBRSD" class="mx-1" style="height: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light  p-3 mt-3">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.pembuka', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <button class="btn btn-primary btn-next" data-id="{{ $topic->id }}">Berikutnya <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <input type="text" class="d-none" id="meeting-id" value="{{ $meeting->id }}">

    </div>
</div>
@endsection

@push('css')
<style>
    .gu-mirror {
        position: fixed !important;
        margin: 0 !important;
        z-index: 9999 !important;
        opacity: 0.8;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        filter: alpha(opacity=80);
    }

    .gu-hide {
        display: none !important;
    }

    .gu-unselectable {
        -webkit-user-select: none !important;
        -moz-user-select: none !important;
        -ms-user-select: none !important;
        user-select: none !important;
    }

    .gu-transit {
        opacity: 0.2;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
        filter: alpha(opacity=20);
    }
</style>
@endpush

@push('js-lib')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js"
    integrity="sha512-MrA7WH8h42LMq8GWxQGmWjrtalBjrfIzCQ+i2EZA26cZ7OBiBd/Uct5S3NP9IBqKx5b+MMNH1PhzTsk6J9nPQQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('js')
    <script src="{{asset('js/pages/siswa-topik-pengenalan4.js')}}"></script>
    <script src="{{asset('js/pages/dragula.js')}}"></script>
@endpush
