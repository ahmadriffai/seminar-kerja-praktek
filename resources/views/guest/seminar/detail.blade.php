@extends("layout.guest")

@section("content")
    <!-- banner -->
    <div class="banner-seminar border-bottom">
        <img src="{{ asset('/asset/img/banner-seminar.jpg') }}" alt="" class="img-fluid">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-3 col-sm-5 col-md-4 mb-sm-7">
                        <div class="border-0 shadow gambar-seminar" style="width: 15rem">
                            <div class="card-gambar">
                                <img src="{{ asset($seminar->gambar) }}" class="img-fluid" alt="..." />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-7 col-md-8 pt-lg-3 pt-sm-0 ps-xl ps-lg-5 ps-sm-4">
                        <span class="badge bg-light text-dark shadow-sm">Seminar Kerja Praktek</span>
                        <h3 class="mt-2">{{ $seminar->nama_seminar }}</h3>
                        <small class="text-muted d-block mb-3">Diselenggarakan oleh: Prodi Teknik Informatika UNSIQ</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 pt-lg-4 pt-sm-0 text-center">
                <span class="text-muted d-block mb-2">Terbuka Hingga:</span>
                <b>{{ date('d F Y', strtotime($seminar->tanggal_selesai )) }}</b>
                <span class="text-muted d-block mt-3 mb-2">Sisa Kuota:</span>
                <b>{{ $seminar->kuota }} peserta</b>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Deskripsi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Penyeminar</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- desk -->

    <div class="container">
        <div class="tab-content pt-5" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row tab-content-detail">
                    <div class="col-lg-9 order-lg-1 order-2 col-lg-push-3 pr-lg-5">
                        <h3>Deskripsi</h3>
                        <div class="fr-view mb-5">
                            {!! $seminar->deskripsi !!}
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-2 order-1 pl-lg-4 mb-5 event-info">

                        @if($terdaftar)
                            <div class="d-registration mb-5">
                                <div class="text-for-element">Keikutsertaan</div>
                                <div class="d-registered-not-start">
                                    <div class="alert alert-success">
                                        Anda sudah terdaftar dalam seminar
                                    </div>
                                </div>

                                <a href=""
                                   class='btn btn-warning text-white shadow btn-md mt-1 btn-'>Lihat Tiket Seminar</a>
                            </div>
                        @else
                            <div class="d-registration mb-5">
                                <div class="text-for-element">Keikutsertaan</div>
                                <div class="d-registered-not-start">
                                    <div class="alert alert-danger">
                                        Anda belum terdaftar dalam seminar
                                    </div>
                                </div>

                                <form method="post" action="{{ route('guest.peserta-seminar.daftar', ['seminar' => $seminar]) }}">
                                    @csrf
                                    <select name="tiket" class="form-select @error('tiket') is-invalid @enderror" aria-label="Default select example">
                                        <option value="">Pilih tiket seminar</option>
                                        @foreach($tiket as $value)
                                            <option value="{{ $value->id }}">{{ $value->tiket }}</option>
                                        @endforeach
                                    </select>
                                    @error('tiket')
                                    <div id="nama" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <button type="submit" class='btn btn-warning text-white shadow btn-md mt-2 btn-'>Daftar Seminar</>
                                </form>
                            </div>
                        @endif


                        <div class="mb-5">
                            <div class="text-for-element">Jadwal Pelaksanaan</div>
                            <div class="row">
                                <div class="col-sm-3">Mulai</div>
                                <div class="col-sm-9">: {{ date('d F Y', strtotime($seminar->tanggal_mulai ))}}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Selesai</div>
                                <div class="col-sm-9">: {{ date('d F Y', strtotime($seminar->tanggal_selesai )) }}</div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="text-for-element">Lokasi</div>
                            <div class="row">
                                <div class="col-sm-2"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="col-sm-10">
                                    <p>{{ $seminar->lokasi }}</p>
                                    <b>Offline</b>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
