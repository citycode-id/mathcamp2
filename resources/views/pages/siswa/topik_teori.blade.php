@extends('layouts.siswa')

@section('content')
<div class="container-fluid" style="height: 85vh;" id="container-wrapper">
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
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="pertemuan-1-tab" data-toggle="pill" href="#pertemuan-1"
                                    role="tab" aria-controls="pertemuan-1" aria-selected="true">Pertemuan 1</a>
                                <a class="nav-link" id="pertemuan-2-tab" data-toggle="pill" href="#pertemuan-2"
                                    role="tab" aria-controls="pertemuan-2" aria-selected="false">Pertemuan 2</a>
                                <a class="nav-link" id="pertemuan-3-tab" data-toggle="pill" href="#pertemuan-3"
                                    role="tab" aria-controls="pertemuan-3" aria-selected="false">Pertemuan 3</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="pertemuan-1" role="tabpanel"
                                    aria-labelledby="pertemuan-1-tab">
                                    <ol style="list-style-type: none;">
                                        <li><strong>3.9.1</strong> Menganalisis rumus luas permukaan balok secara benar
                                            dengan
                                            bantuan video animasi</li>
                                        <li><strong>3.9.2</strong> Menganalisis rumus luas permukaan kubus secara benar
                                            dengan
                                            bantuan video animasi</li>
                                        <li><strong>3.9.3</strong> Menganalisis rumus luas permukaan limas secara benar
                                            dengan
                                            bantuan video animasi</li>
                                        <li><strong>3.9.4</strong> Menganalisis rumus luas permukaan prisma secara benar
                                            dengan
                                            bantuan video animasi</li>
                                        <li><strong>4.9.1</strong> Menyelesaikan masalah sehari-hari yang berkaitan
                                            dengan luas
                                            permukaan balok secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.2</strong> Menyelesaikan masalah sehari-hari yang berkaitan
                                            dengan luas
                                            permukaan kubus secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.3</strong> Menyelesaikan masalah sehari-hari yang berkaitan
                                            dengan luas
                                            permukaan Limas secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.4</strong> Menyelesaikan masalah sehari-hari yang berkaitan
                                            dengan luas
                                            permukaan prisma secara benar dengan bantuan LKPD</li>
                                    </ol>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-2" role="tabpanel"
                                    aria-labelledby="pertemuan-2-tab">
                                    <ol style="list-style-type: none;">
                                        <li><strong>3.9.5</strong> Menganalisis rumus volume balok secara benar dengan
                                            bantuan video
                                            animasi</li>
                                        <li><strong>3.9.6</strong> Menganalisis rumus volume kubus secara benar dengan
                                            bantuan video
                                            animasi</li>
                                        <li><strong>3.9.7</strong> Menganalisis rumus volume prisma secara benar dengan
                                            bantuan
                                            video animasi</li>
                                        <li><strong>3.9.8</strong> Menganalisis rumus volume limas secara benar dengan
                                            bantuan video
                                            animasi</li>
                                        <li><strong>4.9.5</strong> Menyelesaikan permasalahan sehari-hari yang berkaitan
                                            dengan
                                            volume balok secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.6</strong> Menyelesaikan permasalahan sehari-hari yang berkaitan
                                            dengan
                                            volume kubus secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.7</strong> Menyelesaikan permasalahan sehari-hari yang berkaitan
                                            dengan
                                            volume prisma secara benar dengan bantuan LKPD</li>
                                        <li><strong>4.9.8</strong> Menyelesaikan permasalahan sehari-hari yang berkaitan
                                            dengan
                                            volume limas secara benar dengan bantuan LKPD</li>
                                    </ol>
                                </div>
                                <div class="tab-pane fade" id="pertemuan-3" role="tabpanel"
                                    aria-labelledby="pertemuan-3-tab">
                                    <ol style="list-style-type: none;">
                                        <li><strong>3.9.9</strong> Membandingkan volume balok dan kubus secara benar
                                            dengan bantuan
                                            materi pada MathCamp</li>
                                        <li><strong>3.9.10</strong> Membandingkan volume limas dan prisma secara benar
                                            dengan
                                            bantuan materi pada MathCamp</li>
                                        <li><strong>4.9.9</strong> Menyelesaikan permasalahan sehari-hari yang berkaitan
                                            dengan
                                            volume gabungan benda berbentuk kubus dan balok secara benar dengan bantuan
                                            LKPD</li>
                                        <li><strong>4.9.10</strong> Menyelesaikan permasalahan sehari-hari yang
                                            berkaitan dengan
                                            volume gabungan benda berbentuk limas dan prisma secara benar dengan bantuan
                                            LKPD</li>
                                    </ol>
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
