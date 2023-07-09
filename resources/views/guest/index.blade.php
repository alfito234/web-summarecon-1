@extends('layout.main')
@section('container')

    <body class="text-center"
        style="background-image: url('https://rbasset.s3.ap-southeast-1.amazonaws.com/2021/04/kawasan-Summarecon-Bekasi.jpg'); background-size: 100%; object-fit:cover;">
        <div class="d-flex justify-content-center align-items-center" style="min-height:100vh">
            <div class="bg-light w-50 p-5 rounded-4" style="--bs-bg-opacity: .75;">
                <main class="form-signin mb-4">
                    <form action="{{ route('saveregister') }}" method="POST">
                        @csrf
                        <h2 class="h3 mb-4 fw-normal">
                            <b>Form Tamu</b>
                        </h2>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="floatingNama" placeholder="Nama"
                                required />
                            <label for="floatingNama">Nama</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="Email"
                                required />
                            <label for="floatingEmail">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="nohp" id="floatingNoHP" placeholder="NoHP"
                                required />
                            <label for="floatingNoHP">Nomor HP</label>
                        </div>
                        <select class="form-select form-select-md mb-3" name="gender" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <button class="w-100 btn btn-lg btn-warning" type="submit">
                            Register
                        </button>
                    </form>
                </main>
            </div>
        </div>

    </body>
@endsection
