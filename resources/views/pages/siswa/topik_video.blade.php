@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh;" id="container-wrapper">
    <div class="row">

        {{-- Video Pembelajaran --}}
        <div class="col-lg-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Video Pembelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="video-1-tab" data-toggle="pill" href="#video-1"
                                    role="tab" aria-controls="video-1" aria-selected="true">Pertemuan 1</a>
                                <a class="nav-link" id="video-2-tab" data-toggle="pill" href="#video-2" role="tab"
                                    aria-controls="video-2" aria-selected="false">Pertemuan 2</a>
                                <a class="nav-link" id="video-3-tab" data-toggle="pill" href="#video-3" role="tab"
                                    aria-controls="video-3-" aria-selected="false">Pertemuan 3</a>
                                <a class="nav-link" id="video-4-tab" data-toggle="pill" href="#video-4" role="tab"
                                    aria-controls="video-4" aria-selected="false">Pertemuan 4</a>
                                <a class="nav-link" id="video-5-tab" data-toggle="pill" href="#video-5" role="tab"
                                    aria-controls="video-5" aria-selected="false">Pertemuan 5</a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="video-1" role="tabpanel"
                                    aria-labelledby="video-1-tab">
                                    <button type="button" class="btn btn-danger m-1 btn-video" data-video="https://www.youtube.com/embed/W9Sweo_Hil8?autoplay=1">Video 1</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 2</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 3</button>
                                </div>
                                <div class="tab-pane fade" id="video-2" role="tabpanel" aria-labelledby="video-2-tab">
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 1</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 2</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 3</button>
                                </div>
                                <div class="tab-pane fade" id="video-3" role="tabpanel" aria-labelledby="video-3-tab">
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 1</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 2</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 3</button>
                                </div>
                                <div class="tab-pane fade" id="video-4" role="tabpanel" aria-labelledby="video-4-tab">
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 1</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 2</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 3</button>
                                </div>
                                <div class="tab-pane fade" id="video-5" role="tabpanel" aria-labelledby="video-5-tab">
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 1</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 2</button>
                                    <button type="button" class="btn btn-danger m-1 btn-video">Video 3</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MOdul Pembelajaran --}}
        <div class="col-lg-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Modul Pembelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="modul-1-tab" data-toggle="pill" href="#modul-1"
                                    role="tab" aria-controls="modul-1" aria-selected="true">Pertemuan 1</a>
                                <a class="nav-link" id="modul-2-tab" data-toggle="pill" href="#modul-2" role="tab"
                                    aria-controls="modul-2" aria-selected="false">Pertemuan 2</a>
                                <a class="nav-link" id="modul-3-tab" data-toggle="pill" href="#modul-3" role="tab"
                                    aria-controls="modul-3-" aria-selected="false">Pertemuan 3</a>
                                <a class="nav-link" id="modul-4-tab" data-toggle="pill" href="#modul-4" role="tab"
                                    aria-controls="modul-4" aria-selected="false">Pertemuan 4</a>
                                <a class="nav-link" id="modul-5-tab" data-toggle="pill" href="#modul-5" role="tab"
                                    aria-controls="modul-5" aria-selected="false">Pertemuan 5</a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="modul-1" role="tabpanel"
                                    aria-labelledby="modul-1-tab">
                                    <ul>
                                        <li><a href="http://" target="_blank">Modul 1</a></li>
                                        <li><a href="http://" target="_blank">Modul 2</a></li>
                                        <li><a href="http://" target="_blank">Modul 3</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="modul-2" role="tabpanel" aria-labelledby="modul-2-tab">
                                    <ul>
                                        <li><a href="http://" target="_blank">Modul 1</a></li>
                                        <li><a href="http://" target="_blank">Modul 2</a></li>
                                        <li><a href="http://" target="_blank">Modul 3</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="modul-3" role="tabpanel" aria-labelledby="modul-3-tab">
                                    <ul>
                                        <li><a href="http://" target="_blank">Modul 1</a></li>
                                        <li><a href="http://" target="_blank">Modul 2</a></li>
                                        <li><a href="http://" target="_blank">Modul 3</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="modul-4" role="tabpanel" aria-labelledby="modul-4-tab">
                                    <ul>
                                        <li><a href="http://" target="_blank">Modul 1</a></li>
                                        <li><a href="http://" target="_blank">Modul 2</a></li>
                                        <li><a href="http://" target="_blank">Modul 3</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="modul-5" role="tabpanel" aria-labelledby="modul-5-tab">
                                    <ul>
                                        <li><a href="http://" target="_blank">Modul 1</a></li>
                                        <li><a href="http://" target="_blank">Modul 2</a></li>
                                        <li><a href="http://" target="_blank">Modul 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tautan Referensi --}}
        <div class="col-lg-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Tautan Referensi</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Link 1</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Link 2</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Link 3</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Video -->
    <div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="modalVideoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVideoLabel">Video Pembelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe frameborder="0"
                        allow="autoplay;"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light  p-3 mt-3">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.teori', ['id' => $topic->id]) }}" role="button"><i
                    class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <button class="btn btn-primary btn-next" data-id="{{ $topic->id }}">Berikutnya <i
                        class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{asset('js/pages/siswa-topik-video.js')}}"></script>
@endpush


@push('css')
<style>
    .modal-dialog {
        max-width: 700px; /* New width for default modal */
    }

    .modal-content iframe {
        margin: 10px;
        width: 640px;
        height: 360px;
    }
</style>
@endpush
