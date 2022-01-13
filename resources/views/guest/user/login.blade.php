@extends("layout.guest")

@section("content")
    <section id="kerja-praktek" class="bg-white pb-5 mb-5 mt-2">
        <div class="container">
            <div class="row pt-3">
                <div class="section-judul">
                    <h3>Login User</h3>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('guest.user.login-post') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Username / Email</label>
                            <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Email atau Username">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-warning">Login</button>

                    </form>
                </div>
                <div class="col-md-6 order-first">
                    <img src="{{ asset('asset/img/login-image.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>
    <!-- //apa itu kerja praktek -->
@endsection
