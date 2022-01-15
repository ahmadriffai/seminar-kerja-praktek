@extends("layout.admin")

@section("head")
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
@endsection

@section("content")

    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>

    <div class="row mt-2">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.seminar.add-post') }}" enctype="multipart/form-data">

                        @Csrf

                        <div class="mb-3">
                            <label for="nama_seminar" class="form-label">Nama Seminar</label>
                            <input type="text" name="nama_seminar"
                                   class="form-control @error('nama_seminar') is-invalid @enderror" id="nama_seminar"
                                   placeholder="Nama Seminar" value="{{ old('nama_seminar') }}">
                            @error('nama_seminar')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>


                            <textarea name="deskripsi" id="editor" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}">
                                {{ old('deskripsi') ?? ""}}
                            </textarea>

                            @error('deskripsi')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai"
                                   class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai"
                                   placeholder="Tanggal Mulai"
                                   min="<?= date('Y-m-d') ?>"
                                   value="{{ old('tanggal_mulai') }}">
                            @error('tanggal_mulai')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai"
                                   class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai"
                                   min="<?= date('Y-m-d') ?>"
                                   placeholder="Tanggal Selesai" value="{{ old('tanggal_selesai') }}">
                            @error('tanggal_selesai')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi"
                                   class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                   placeholder="ex : Aula Kampus, Gedung " value="{{ old('lokasi') }}">
                            @error('lokasi')
                            <div id="nama_seminar" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="kuota" class="form-label">Kuota</label>
                            <input type="number" name="kuota"
                                   class="form-control @error('kuota') is-invalid @enderror" id="kuota"
                                   placeholder="ex: 100 peserta " value="{{ old('kuota') }}">
                            @error('kuota')
                            <div id="kuota" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Thumnail</label>
                            <input type="file" name="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                   placeholder="note : flayer  " value="{{ old('gambar') }}">
                            @error('gambar')
                            <div id="kuota" class="invalid-feedback">
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

@section('script')
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection
