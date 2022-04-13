@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh; display:flex; flex-direction:column; flex:1;" id="container-wrapper">
    <div class="row">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-12 d-flex mb-3">
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

            <div class="col-lg-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-white mb-0">Diskusi Kelompok</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-primary btn-reply" data-group="{{ $group->id }}"><i class="fas fa-reply"></i> Balas</button>
                        </div>
                        <ul class="list-group scrollable" data-group="{{ $group->id}}">
                            @forelse ($discussion as $discuss)
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
          </div>
        </div>
        <div class="col-lg-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-info">
                    <h5 class="card-title text-white mb-0">Anggota Kelompok</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group scrollable2">
                        @foreach ($member as $user)
                        <li class="list-group-item">{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row bg-light p-3 mt-auto">
        <div class="col-lg-6">
            <a class="btn btn-primary" href="{{ route('student.topic.video', ['id' => $topic->id]) }}" role="button"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>

        <div class="col-lg-6 float-right">
            <div class="float-right">
                <button class="btn btn-primary btn-next" data-id="{{ $topic->id }}">Berikutnya <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <input type="text" class="d-none" id="meeting-id" value="{{ $meeting->id }}">

    </div>

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
                          <input type="file" class="custom-file-input" name="file" id="customFile" accept=".png,.jpg,.jpeg">
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
<script src="https://cdn.jsdelivr.net/npm/luxon@2.3.0/build/global/luxon.min.js"></script>
@endpush

@push('js')
<script src="{{asset('js/pages/siswa-topik-diskusi.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@2.3.0/build/global/luxon.min.js"></script>
@endpush

@push('css')
<style>
    .scrollable {
        overflow-y: auto;
        max-height: 300px;
    }

    .scrollable2 {
        overflow-y: auto;
        height: 350px;
    }
</style>
@endpush
