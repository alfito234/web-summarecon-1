@extends('layout.main')

@section('container')
<body class="text-center"
    style="background-image: url('https://rbasset.s3.ap-southeast-1.amazonaws.com/2021/04/kawasan-Summarecon-Bekasi.jpg'); background-size: 100%">
    <div class="d-flex justify-content-center align-items-center" style="min-height:100vh">
        <div class="bg-light w-50 p-5 rounded-4" style="--bs-bg-opacity: .75;">
            <main class="form-signin mb-4">
                <p class="fs-3"><b>SUMMARECON</b></p>
                <p class="fs-3"><b>Login</b></p>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="floatingUsername"
                            placeholder="Username" required />
                        <label>Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" required />
                        <label>Password</label>
                    </div>
                    <button type="submit" class="w-100 btn btn-lg btn-warning">Login</button>

                </form>
            </main>
        </div>
    </div>

</body>
    
@endsection

