@extends('layouts.siswa')

@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center" style="height: 85vh;"
    id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <h3 class="text-center mb-0"><strong>{{ $topic->name }}</strong></h3>
                        </div>
                        <div class="col-md-6 text-center">
                            <a class="btn btn-outline-primary btn-block my-2" href="{{ route('student.topic.pengenalan', ['id' => $topic->id]) }}" role="button">Pengenalan</a>
                            <a class="btn btn-outline-primary btn-block my-2" href="{{ route('student.topic.teori', ['id' => $topic->id]) }}" role="button">Teori</a>
                            <a class="btn btn-outline-primary btn-block my-2" href="{{ route('student.topic.video', ['id' => $topic->id]) }}" role="button">Video Pembelajaran</a>
                            <a class="btn btn-outline-primary btn-block my-2" href="{{ route('student.topic.diskusi', ['id' => $topic->id]) }}" role="button">Diskusi Kelompok</a>
                            <a class="btn btn-outline-primary btn-block my-2" href="{{ route('student.topic.tugas', ['id' => $topic->id]) }}" role="button">Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
