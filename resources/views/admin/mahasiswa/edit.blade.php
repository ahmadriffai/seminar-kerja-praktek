@extends("layout.admin")

@section("content")

    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>

    <div class="row mt-2">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.mahasiswa.edit-post', ['nim' => $mahasiswa->nim]) }}">

                        @Csrf

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim"
                                   class="form-control @error('nim') is-invalid @enderror" id="nim"
                                   placeholder="Nomer Induk Mahasiswa" value="{{ $mahasiswa->nim }}">
                            @error('nim')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   id="nama"
                                   placeholder="Nama Lengkap Mahasiswa" value="{{ $mahasiswa->nama }}">
                            @error('nama')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select class="form-select @error('prodi') is-invalid @enderror" name="prodi" aria-label="Default select example">
                                <option value="">-- Pilih Prodi --</option>
                                <option value="Teknik Informatika" {{ $mahasiswa->prodi == 'Teknik Informatika' ? 'selected': ''}}>
                                    Teknik Informatika
                                </option>
                            </select>
                            @error('prodi')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <select class="form-select @error('angkatan') is-invalid @enderror" name="angkatan" aria-label="Default select example">
                                <option value="">-- Pilih Angkatan --</option>
                                @foreach($angkatan as $value)
                                    <option value="{{ $value }}" {{ $value == $mahasiswa->angkatan ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('angkatan')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nomer Telephone</label>
                            <input type="text" name="nomerTelp"
                                   class="form-control @error('nomerTelp') is-invalid @enderror"
                                   id="nama" placeholder="Nomer Telephone" value="{{ $mahasiswa->nomer_telp }}">
                            @error('nomerTelp')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
