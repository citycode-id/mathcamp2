@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh; display:flex; flex-direction:column; flex:1;" id="container-wrapper">
    <div class="row">
        <div class="col-lg-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Point Materi Pembelajaran</h5>
                </div>
                <div class="card-body">
                    <p>
                        {!! base64_decode($topic->points) !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Tujuan Pembelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Pertemuan {{ $meeting->meeting }}</h5>
                            <p>
                                {!! base64_decode($meeting->goals) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light p-3 mt-auto">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.pengenalan', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <button class="btn btn-primary btn-next" data-id="{{ $topic->id }}">Berikutnya <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('js/pages/siswa-topik-teori.js')}}"></script>
@endpush
