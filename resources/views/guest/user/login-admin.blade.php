@extends("layout.guest")

@section("content")
    <div class="row my-5 pb-5">
        <div class="col-md-12 my-5">
            <div class="card border-0 mx-auto shadow" style="width: 30rem">
                <div class="card-header text-center bg-white">
                    <img src="{{ asset('asset/img/logo-unsiq.png') }}"  class="img-fluid mx-auto" width="200px" alt="" sizes="" srcset="">
                    <h3 class="mx-auto mt-4">Login Admin </h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('guest.user.login-admin-post') }}">
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
            </div>
        </div>
    </div>

@endsection
