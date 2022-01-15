@extends("layout.guest")

@section("content")
    <div class="container">
        <div class="row pt-5 mt-5">
            <div class="col-lg-3 col-md-12">
                <h5 class="fw-normal">Daftar Seminar</h5>
                <p>Kembangkan pengetahuan dengan mengikuti seminar kerja prakter</p>
            </div>
            <div class="col-lg-9 col-md-12">
                <form method="get" action="{{ route('guest.seminar.search') }}">
                    <div class="input-group mb-3">
                        <input type="text" name="key" class="form-control shadow border-0" placeholder="Cari Seminar" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ $_GET['key'] ?? '' }}">
                        <button class="btn btn-primary shadow-sm" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <div class="row">
                    @foreach($seminar as $value)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card border-0 my-4 shadow mx-auto" style="width: 20rem">
                            <div class="card-gambar">
                                <img src="{{ asset($value->gambar) }}" class="img-fluid" alt="..." />
                            </div>
                            <div class="card-body">
                                <span class="badge bg-light text-dark shadow-sm">Seminar Kerja Praktek</span>
                                <h5 class="card-title pt-3">
                                    {{ $value->nama_seminar }}
                                </h5>
                                <p class="text-black-50">
                                    {!!implode(" ",array_slice(explode(" ",$value->deskripsi), 0,5)) !!}...
                                </p>
                                <a href="{{ route('guest.seminar.detail', ['id' => $value->id]) }}" class="btn btn-sm btn-outline-warning">Daftar</a>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <p class="text-black-50">Sisa Kuota : {{ $value->kuota }}</p>
                                <p class="text-black-50">{{ (int)date('d', strtotime($value->tanggal_selesai)) - (int)date('d') }} hari lagi</p>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    {{ $seminar->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
