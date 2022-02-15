<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{asset('css/landing.css')}}" />
    <title>Mathcamp</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold text-warning">Mathcamp</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li>
                        @auth
                            <a role="button" href="{{ url('/home') }}" class="btn btn-primary justify-content-end">Beranda</a>
                        @else
                            <a role="button" href="{{ route('login') }}" class="btn btn-primary justify-content-end">Masuk</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Showcase -->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Cara Asik Belajar <span class="text-warning"> Matematika </span></h1>
                    <p class="lead my-4"><span class="text-warning fw-bold">Mathcamp</span> fokus di pemahaman konsep fundamental
                        siswa-siswi kami sehingga
                        mereka tetap
                        menyelesaikan soal meskipun dengan berbagai macam bentuk.</p>

                    <!-- Trigger Modals -->
                    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Gabung
                        Sekarang!</a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="{{asset('img/hero-1.svg')}}" alt="" id="hero" />
            </div>
        </div>
    </section>
    <!-- Akhir Showcase -->

    <!-- Newsletter -->
    <section class="bg-primary text-light p-5">
        <div class="container">
            <div class="d-md-flex justify-content-center align-items-center">
                <h3 class="mb-3 mb-md-0">Area Yang Menjadi Fokus Kami</h3>
            </div>
        </div>
    </section>
    <!-- Akhir Newsletter -->

    <!-- Boxes -->
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="ard-title mb-3">Virtual</h3>
                            <p class="card-text">Guru dan murid bisa melakukan kegiatan belajar dan mengajar dalam jaringan.</p>
                            <a href="#" class="btn btn-primary">Baca Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-person-square"></i>
                            </div>
                            <h3 class="ard-title mb-3">Hybrid</h3>
                            <p class="card-text">Tugas bisa dikerjakan secara daring dan dibahas ketika berada di dalam kelas</p>
                            <a href="#" class="btn btn-dark">Baca Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="ard-title mb-3">1 on 1 Coaching</h3>
                            <p class="card-text">Guru dan siswa bisa melakukan konsultasi tentang pelajaran secara privat</p>
                            <a href="#" class="btn btn-primary">Baca Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Boxes -->



    <!-- Questions Accordion -->
    <section id="" class="p-5">
        <div class="container">
            <h2 class="text-center mb-4">Pertanyaan Yang Paling Sering Muncul</h2>
            <div class="accordion accordion-flush" id="questions">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">Apa itu Mathcamp?</button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Mathcamp adalah learning management system (LMS) yang bertujuan untuk meningkatkan literasi ICT di kalangan guru dan siswa.
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">Apakah Mathcamp berbayar?</button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Tidak! Setiap orang bebas memanfaatkan Mathcamp untuk tujuan pembelajaran dan pengembangan literasi ICT.
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">Apakah saya butuh jaringan internet?</button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Ya, kamu butuh jaringan internet dalam mengakses semua modul pembelajaran yang ada di Mathcamp. Jika kamu punya kendala dalam hal kuota internet, silahkan hubungi wali kelas kamu untuk mendapatkan akses kuota internet gratis.
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">Bagaimana caranya mendaftar akun di Mathcamp?</button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Lihat pojok kanan atas, ada tombol masuk berwarna biru? Kamu bisa mendaftarkan akun terlebih dahulu disana.
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">Apakah Matchcamp akan membantu saya ketika sulit mencerna materi pelajaran?</button>
                    </h2>
                    <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Kamu bisa manfaatkan fitur diskusi dalam forum dan juga bisa langsung menanyakan ke guru ketika ada materi yang dirasa sulit. Kamu juga bisa menggunakan fitur 1 on 1 Coaching di Mathcamp.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Questions Accordion -->


    <!-- Contacts & Map -->
    <section class="p-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-center mb-4">Hubungi Kami</h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item"><span class="fw-bold">Lokasi</span> UNY, Yogyakarta</li>
                        <li class="list-group-item"><span class="fw-bold">Telpon</span> 082125609413</li>
                        <li class="list-group-item"><span class="fw-bold">Email</span> hi@mathcamp.id</li>
                        <li class="list-group-item"><span class="fw-bold">Instagram</span> Mathcamp.id</li>
                        <li class="list-group-item"><span class="fw-bold">Kerja Sama</span> partnership@mathcamp.id</li>
                    </ul>
                </div>
                <div class="col-md">
                    <div id="map">
                        <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.677312439031!2d106.78704721413709!3d-6.173939062217795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f73add25d7ab%3A0x5c0265cf5e639bb5!2sSOHO%20CAPITAL!5e0!3m2!1sid!2sid!4v1625505461480!5m2!1sid!2sid"
                          width="100%" height="100%" style="border-radius: 10px" allowfullscreen="" loading="lazy"></iframe>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Contacts & Map -->

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2021 Mathcamp</p>
            <p>
                Made with
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                </svg>
                by <a href="https://citycode.tech/" class="text-white fw-bold">Citycode</a>
            </p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
