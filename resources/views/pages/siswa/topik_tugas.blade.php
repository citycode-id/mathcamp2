@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh; display:flex; flex-direction:column; flex:1;" id="container-wrapper">
    <div class="row">

        {{-- Tugas Kelompok --}}
        <div class="col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Tugas Kelompok</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Pertemuan {{ $meeting->meeting }}</h5>
                            @foreach ($meeting->assignments as $assignment )
                            <a role="button" target="_blank" href="{{ asset('storage/assignments/'.$assignment->file) }}" class="btn btn-danger btn-block mb-3"><i class="fas fa-file-pdf"></i> Download {{ $assignment->name }}</a>
                            <p id="assignment-answer">
                                @if (!empty($assign))
                                    <a href="{{ asset('storage/answers/'.$assign->file) }}" target="_blank" rel="noopener noreferrer">Hasil Tugas</a> - <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $assign->created_at)->format('d-m-Y H:i:s') }}</small>
                                @endif
                            </p>
                            <button type="button" class="btn btn-outline-success btn-assignment" data-meeting="{{ $meeting->id }}">Upload Jawaban</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tugas Pribadi --}}
        <div class="col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">Tugas Pribadi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Pertemuan {{ $meeting->meeting }}</h5>
                            @foreach ($meeting->tasks as $task )
                            <a role="button" target="_blank" href="{{ asset('storage/tasks/'.$task->file) }}" class="btn btn-danger btn-block mb-3"><i class="fas fa-file-pdf"></i> Download {{ $task->name }}</a>
                            <p id="task-answer">
                                @if (!empty($answer))
                                    <a href="{{ asset('storage/answers/'.$answer->file) }}" target="_blank" rel="noopener noreferrer">Hasil Tugas</a> - <small>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $answer->created_at)->format('d-m-Y H:i:s') }}</small>
                                @endif
                            </p>
                            <button type="button" class="btn btn-outline-success btn-task" data-meeting="{{ $meeting->id }}">Upload Jawaban</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light p-3 mt-auto">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.diskusi', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <a href="{{ route('home') }}" class="btn btn-success btn-next">Selesai <i class="fas fa-check"></i></a>
            </div>
        </div>
    </div>

    <!-- Modal Assignment -->
    <div class="modal fade" id="modalAssignment" tabindex="-1" aria-labelledby="modalAssignmentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAssignmentLabel">Unggah Tugas Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-assignment">
                    <div class="modal-body">
                        <input type="text" class="d-none meeting-id"  name="id">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="customFile" accept=".pdf">
                            <label class="custom-file-label" for="customFile" data-browse="Pilih">Pilih File</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Unggah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Task -->
    <div class="modal fade" id="modalTask" tabindex="-1" aria-labelledby="modalTaskLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTaskLabel">Unggah Tugas Individu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="form-task">
                    <div class="modal-body">
                        <input type="text" class="d-none meeting-id"  name="id">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="customFile" accept=".pdf">
                            <label class="custom-file-label" for="customFile" data-browse="Pilih">Pilih File</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Unggah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js-lib')
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
@endpush

@push('js')
<script src="{{asset('js/pages/siswa-topik-tugas.js')}}"></script>
@endpush
