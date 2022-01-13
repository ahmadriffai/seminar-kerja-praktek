@extends("layout.guest")

@section("content")
    <div class="row my-5 pb-5">
        <div class="col-md-12 my-5">
            <div class="card border-0 mx-auto shadow" style="width: 30rem">
                <div class="card-header text-center bg-white">
                    <img src="{{ asset('asset/img/logo-unsiq.png') }}"  class="img-fluid mx-auto" width="200px" alt="" sizes="" srcset="">
                    <h3 class="mx-auto mt-4">Registrasi Akun Seminar Kerja Praktek</h3>
                </div>
                <div class="card-body">
                    <p>Untuk mendapatkan akun , silahkan masukan <b>NIM</b> anda</p>

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('guest.user.check-nim-post') }}" enctype="multipart/form-data">

                        @Csrf

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim"
                                   class="form-control @error('nim') is-invalid @enderror" id="nim"
                                   placeholder="Nomor Induk Mahasiswa" value="{{ old('nim') }}">
                            @error('nim')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-warning text-white shadow">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
