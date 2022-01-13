@extends("layout.admin")

@section("content")
    <div class="row mb-2">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row pt-2">
                    <div class="col-md-8">
                        <a href="{{ route('admin.mahasiswa.add') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah Data Mahasiswa</a>

                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-file-import"></i> Import Excel
                        </button>
                    </div>
                    <div class="col-md-4 mt-2">
                        <form method="get" action="{{ route('admin.mahasiswa.search') }}">
                            <div class="input-group mb-3">
                                <input type="text" name="key" class="form-control shadow-sm border-0" placeholder="Cari Mahasiswa (nim,nama)" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ $_GET['key'] ?? '' }}">
                                <button class="btn btn-primary shadow-sm" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped mt-3">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Nomer Telp.</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($mahasiswa as $value)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $value->nim }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->prodi }}</td>
                        <td>{{ $value->nomer_telp  }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('admin.mahasiswa.edit', ['nim' => $value->nim]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.mahasiswa.delete', ['nim' => $value->nim]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $mahasiswa->links() }}
            </div>
        </div>
    </div>

{{--  modal  --}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form method="post" action="{{ route('admin.mahasiswa.import-post') }}" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            Download template excel untuk dapat mengimport
                            <a href="{{ asset('asset/format-exel/format_import_data_mahasiswa.xlsx') }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-download"></i> Download Template</a>
                        </div>

                        @Csrf
                        <div class="mb-3">
                            <input type="file" name="file_excel"
                                   class="form-control @error('file_excel') is-invalid @enderror" id="file_excel"
                                   placeholder="Nomer Induk Mahasiswa" value="{{ old('file_excel') }}">
                            @error('file_excel')
                            <div id="nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
