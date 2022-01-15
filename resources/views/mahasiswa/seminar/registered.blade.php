@extends("layout.mahasiswa")

@section("content")
    <div class="row">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-normal">Seminar Terdaftar</h5>
                Anda telah terdaftar pada seminar :
                <div class="row">
                    @foreach($seminar as $value)
                    <div class="col-lg-6 col-md-12">
                        <div class="card border-0 bg-light mt-3">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr class="mt-3">
                                        <th colspan="3" class="fw-normal">
                                            {{ $value->nama_seminar }} ( {{ $value->pivot->tiket->tiket }} )
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Mulai</td>
                                        <td>:</td>
                                        <td>
                                            <span class="fw-normal"> {{ date('d F Y', strtotime($value->tanggal_mulai )) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat</td>
                                        <td>:</td>
                                        <td>
                                            <span class="fw-normal">{{ $value->lokasi }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            @if($value->pivot->is_bayar)
                                                <span class="badge bg-light shadow-sm text-success">Terbayar</span>
                                            @else
                                                <span class="badge bg-light shadow-sm text-danger">Belum terbayar</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="mt-3">
                                        <th colspan="3">
                                            <a class="btn btn-light btn-sm shadow">Detail Seminar</a>
                                            @if($value->pivot->is_bayar)
                                                <a class="btn btn-warning btn-sm text-white shadow ms-2">Lihat Tiker Seminar</a>
                                            @else
                                                <a class="btn btn-warning btn-sm text-white shadow ms-2">Bayar</a>
                                            @endif
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $seminar->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
