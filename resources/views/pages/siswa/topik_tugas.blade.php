@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh;" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-primary">
                    <h5 class="card-title text-white mb-0">Tugas Kelompok</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="pertemuan-1-tab" data-toggle="pill" href="#pertemuan-1"
                                    role="tab" aria-controls="pertemuan-1" aria-selected="true">Pertemuan 1</a>
                                <a class="nav-link" id="pertemuan-2-tab" data-toggle="pill" href="#pertemuan-2"
                                    role="tab" aria-controls="pertemuan-2" aria-selected="false">Pertemuan 2</a>
                                <a class="nav-link" id="pertemuan-3-tab" data-toggle="pill" href="#pertemuan-3"
                                    role="tab" aria-controls="pertemuan-3" aria-selected="false">Pertemuan 3</a>
                                <a class="nav-link" id="pertemuan-4-tab" data-toggle="pill" href="#pertemuan-4"
                                    role="tab" aria-controls="pertemuan-4" aria-selected="false">Pertemuan 4</a>
                                <a class="nav-link" id="pertemuan-5-tab" data-toggle="pill" href="#pertemuan-5"
                                    role="tab" aria-controls="pertemuan-5" aria-selected="false">Pertemuan 5</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="pertemuan-1" role="tabpanel"
                                    aria-labelledby="pertemuan-1-tab">
                                    <p>Belum ada tugas yang diunggah</p>
                                    <button type="button" class="btn btn-outline-success">Unggah</button>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-2" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <p>Belum ada tugas yang diunggah</p>
                                    <button type="button" class="btn btn-outline-success">Unggah</button>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-3" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <p>Belum ada tugas yang diunggah</p>
                                    <button type="button" class="btn btn-outline-success">Unggah</button>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-4" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <p>Belum ada tugas yang diunggah</p>
                                    <button type="button" class="btn btn-outline-success">Unggah</button>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-5" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <p>Belum ada tugas yang diunggah</p>
                                    <button type="button" class="btn btn-outline-success">Unggah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">Tugas Pribadi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="tugas-1-tab" data-toggle="pill" href="#tugas-1"
                                    role="tab" aria-controls="tugas-1" aria-selected="true">Tugas 1</a>
                                <a class="nav-link" id="tugas-2-tab" data-toggle="pill" href="#tugas-2" role="tab"
                                    aria-controls="tugas-2" aria-selected="false">Tugas 2</a>
                                <a class="nav-link" id="tugas-3-tab" data-toggle="pill" href="#tugas-3" role="tab"
                                    aria-controls="tugas-3-" aria-selected="false">Tugas 3</a>
                                <a class="nav-link" id="tugas-4-tab" data-toggle="pill" href="#tugas-4" role="tab"
                                    aria-controls="tugas-4" aria-selected="false">Tugas 4</a>
                                <a class="nav-link" id="tugas-5-tab" data-toggle="pill" href="#tugas-5" role="tab"
                                    aria-controls="tugas-5" aria-selected="false">Tugas 5</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="tugas-1" role="tabpanel"
                                    aria-labelledby="tugas-1-tab">
                                    <dl class="row">
                                        <dt class="col-sm-3">Soal</dt>
                                        <dd class="col-sm-9">: <a href="#">Soal1.pdf</a></dd>

                                        <dt class="col-sm-3">Jawaban</dt>
                                        <dd class="col-sm-9">: <a href="#">Jawaban1.pdf</a></dd>
                                    </dl>
                                    <button type="button" class="btn btn-outline-success">Unggah Jawaban</button>
                                </div>
                                <div class="tab-pane fade" id="tugas-2" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <dl class="row">
                                        <dt class="col-sm-3">Soal</dt>
                                        <dd class="col-sm-9">: <a href="#">Soal1.pdf</a></dd>

                                        <dt class="col-sm-3">Jawaban</dt>
                                        <dd class="col-sm-9">: <a href="#">Jawaban1.pdf</a></dd>
                                    </dl>
                                    <button type="button" class="btn btn-outline-success">Unggah Jawaban</button>
                                </div>
                                <div class="tab-pane fade" id="tugas-3" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <dl class="row">
                                        <dt class="col-sm-3">Soal</dt>
                                        <dd class="col-sm-9">: <a href="#">Soal1.pdf</a></dd>

                                        <dt class="col-sm-3">Jawaban</dt>
                                        <dd class="col-sm-9">: <a href="#">Jawaban1.pdf</a></dd>
                                    </dl>
                                    <button type="button" class="btn btn-outline-success">Unggah Jawaban</button>
                                </div>
                                <div class="tab-pane fade" id="tugas-4" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <dl class="row">
                                        <dt class="col-sm-3">Soal</dt>
                                        <dd class="col-sm-9">: <a href="#">Soal1.pdf</a></dd>

                                        <dt class="col-sm-3">Jawaban</dt>
                                        <dd class="col-sm-9">: <a href="#">Jawaban1.pdf</a></dd>
                                    </dl>
                                    <button type="button" class="btn btn-outline-success">Unggah Jawaban</button>
                                </div>
                                <div class="tab-pane fade" id="tugas-5" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <dl class="row">
                                        <dt class="col-sm-3">Soal</dt>
                                        <dd class="col-sm-9">: <a href="#">Soal1.pdf</a></dd>

                                        <dt class="col-sm-3">Jawaban</dt>
                                        <dd class="col-sm-9">: <a href="#">Jawaban1.pdf</a></dd>
                                    </dl>
                                    <button type="button" class="btn btn-outline-success">Unggah Jawaban</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light  p-3 mt-3">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.diskusi', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <button class="btn btn-success btn-next">Selesai <i class="fas fa-check"></i></button>
            </div>
        </div>
    </div>

    <!-- Modal Tugas -->
    <div class="modal fade" id="modalTugas" tabindex="-1" aria-labelledby="modalTugasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTugasLabel">Unggah Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" accept=".pdf">
                            <label class="custom-file-label" for="customFile" data-browse="Pilih">Pilih File</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Unggah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{asset('js/pages/siswa-topik-tugas.js')}}"></script>
@endpush
