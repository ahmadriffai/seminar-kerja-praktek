@extends("layout.admin")

@section("content")
    <div class="row mb-2">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row pt-2">
                    <div class="col-md-8">
                        <a href="{{ route('admin.seminar.add') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Buat Seminar</a>
                    </div>
                    <div class="col-md-4 mt-2">
                        <form method="get" action="{{ route('admin.mahasiswa.search') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="key" class="form-control shadow-sm border-0" placeholder="Cari Seminar" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ $_GET['key'] ?? '' }}">
                                <button class="btn btn-primary shadow-sm" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                    <span class="badge bg-success">seminar Kerja Praktek</span>
                    <h5 class="card-title">
                        {{ $value->nama_seminar }}
                    </h5>
                    <p class="text-black-50">
                        {{ $value->deskripsi }}
                    </p>
                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <p class="text-black-50">Sisa Kuota : {{ $value->kuota }}</p>
                    <p class="text-black-50">10 hari lagi</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
