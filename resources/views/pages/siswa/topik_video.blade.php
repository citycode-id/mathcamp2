@extends('layouts.siswa')

@section('content')
<div class="container-fluid " style="height: 85vh; display:flex; flex-direction:column; flex:1;" id="container-wrapper">
    <div class="row">

        {{-- Video Pembelajaran --}}
        <div class="col-lg-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Video Pembelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @foreach ($meeting->videos as $video)
                                <button type="button" class="btn btn-block btn-danger m-1 btn-video" data-video="{{ $video->url }}"><i class="fab fa-youtube"></i> {{ $video->name }}</button>
                            @endforeach
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
                        <div class="col-12">
                            @foreach ($meeting->modules as $module)
                                <a class="btn btn-block btn-danger m-1" href="{{ $module->url }}" target="_blank" role="button"><i class="fas fa-file-pdf"></i> {{ $module->name }}</a>
                            @endforeach
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
                        @foreach ($topic->references as $ref)
                        <li><a href="{{ $ref->url }}" target="_blank" rel="noopener noreferrer">{{$ref->name}}</a></li>
                        @endforeach
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

    <div class="row bg-light p-3 mt-auto">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.teori', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i> Kembali</a>
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
