@extends("layout.guest")

@section("content")

    <!-- banner -->
    <div class="container pt-5">
        <div class="row mt-5 banner">
            <div class="col-md-6">
                <h1 class="text-dark">Seminar Kerja Praktek</h1>
                <p class="text-black-50">
                    Daftarkan Seminar Kerja Praktek kamu dan dapatkan ilmu dan
                    pengalaman yang bermanfaat
                </p>
                <a href="" class="btn btn-warning text-white shadow mt-4">Daftar Sekarang</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/img/landing1.png') }}" alt="" class="img-fluid" width="400px"/>
            </div>
        </div>
    </div>
    <!-- //banner -->

    <!-- daftar seminar kp terbaru -->
    <section id="kerja-praktek" class="bg-light">
        <div class="container py-5">
            <div class="row pt-3">
                <div class="section-judul text-center">
                    <h3>Kerja Praktek Terbaru</h3>
                </div>
            </div>
            <div class="row mt-4 d-flex flex-lg-wrap justify-content-lg-start">
                @foreach($seminar as $value)
                    <div class="col-md ">
                        <div class="card border-0 mx-3 mt-3 shadow" style="width: 20rem">
                            <div class="card-gambar">
                                <img src="{{ asset($value->gambar) }}" class="img-fluid" alt="..." />
                            </div>
                            <div class="card-body">
                                <span class="badge bg-light text-dark shadow-sm">Seminar Kerja Praktek</span>
                                <h5 class="card-title pt-3">
                                    {{ $value->nama_seminar }}
                                </h5>
                                <p class="text-black-50">
                                    {{ $value->deskripsi }}
                                </p>
                                <a href="{{ route('guest.seminar.detail', ['id' => $value->id]) }}" class="btn btn-sm btn-outline-warning">Daftar</a>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <p class="text-black-50">Sisa Kuota : {{ $value->kuota }}</p>
                                <p class="text-black-50">10 hari lagi</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row pt-3">
                <div class="section-judul text-center">
                    <a class="btn btn-warning text-white btn-sm shadow">Lihat Seminar Lainya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- //daftar seminar kp terbaru -->

    <!-- apa itu kerja praktek -->
    <section id="kerja-praktek" class="bg-white">
        <div class="container mt-5">
            <div class="row pt-3">
                <div class="section-judul text-center">
                    <h3>Kerja Praktek</h3>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">
                    <img src="{{ asset('asset/img/landing2.png') }}" alt="" class="img-fluid" />
                </div>
                <div class="col-md-6">
                    <p class="pt-4">
                        Kerja Praktek adalah salah satu mata kuliah yang harus diikuti
                        oleh mahasiswa Teknik Informatika UNSIQ yang dimana ujian dari
                        mata kuliah tersebut berupa seminar. Pada seminar kerja praktek
                        tersebut diikuti oleh mahasiswa yang ingin menyelesaikan mata
                        kuliah kerja praktek sebagai penyeminar dan mahasiswa ditingkat
                        bawah sebagai peserta
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- //apa itu kerja praktek -->

    <!-- Kenapa kerja praktek -->
    <section id="kerja-praktek" class="bg-light py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="section-judul text-center">
                    <h3>Kenapa Kerja Praktek?</h3>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseOne"
                                >
                                    Menjadi Syarat Seminar KP
                                </button>
                            </h2>
                            <div
                                id="flush-collapseOne"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample"
                            >
                                <div class="accordion-body">
                                    Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is
                                    the first item's accordion body.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseTwo"
                                >
                                    Wajib Bagi yang sudah menyelesaikan Mata Kuliah Kerja
                                    Praktek
                                </button>
                            </h2>
                            <div
                                id="flush-collapseTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo"
                                data-bs-parent="#accordionFlushExample"
                            >
                                <div class="accordion-body">
                                    Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is
                                    the second item's accordion body. Let's imagine this being
                                    filled with some actual content.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree"
                                    aria-expanded="false"
                                    aria-controls="flush-collapseThree"
                                >
                                    Menambah Pengalaman
                                </button>
                            </h2>
                            <div
                                id="flush-collapseThree"
                                class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree"
                                data-bs-parent="#accordionFlushExample"
                            >
                                <div class="accordion-body">
                                    Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is
                                    the third item's accordion body. Nothing more exciting
                                    happening here in terms of content, but just filling up the
                                    space to make it look, at least at first glance, a bit more
                                    representative of how this would look in a real-world
                                    application.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Kenapa kerja praktek -->

@endsection
