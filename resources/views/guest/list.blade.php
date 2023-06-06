@extends('layout.main')

@section('container')

    <body style="background: linear-gradient(90deg, rgba(225,111,33,1) 0%, rgba(225,113,37,1) 35%, rgba(233,202,8,1) 100%);">
        <div class="container-sm p-5" style="min-height: 100vh">
            <div class="col-md">

                {{-- Card --}}
                <div class="card rounded-4">
                    <div class="card-header d-flex flex-row justify-content-between p-3">
                        <h3>Dashboard Admin</h3>
                        <a href="{{ route('actionlogout') }}" class="btn btn-danger">Logout</a>
                    </div>
                    <div class="card-body mx-2 mb-1">

                        {{-- filter tanggal --}}
                        <div class="d-flex justify-content-end pt-2 pe-4">
                            <form action="{{ route('filterDate') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="start_date" 
                                    >
                                    <input type="date" class="form-control" name="end_date" 
                                    >
                                    <button class="btn btn-warning" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>

                        {{-- Tab Tamu dan Kunjungan --}}
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tamu-tab" data-bs-toggle="tab"
                                    data-bs-target="#tamu-tab-pane" type="button" role="tab"
                                    aria-controls="tamu-tab-pane" aria-selected="true">Tamu</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="kunjungan-tab" data-bs-toggle="tab"
                                    data-bs-target="#kunjungan-tab-pane" type="button" role="tab"
                                    aria-controls="kunjungan-tab-pane" aria-selected="false">Kunjungan</button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="waktu-tab" data-bs-toggle="tab"
                                    data-bs-target="#waktu-tab-pane" type="button" role="tab"
                                    aria-controls="waktu-tab-pane" aria-selected="false">Waktu</button>
                            </li> --}}
                        </ul>

                        {{-- Isi tab Tamu --}}
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tamu-tab-pane" role="tabpanel"
                                aria-labelledby="tamu-tab" tabindex="0">
                                <div class="card-body mb-2">
                                    <div class="overflow-auto m-2" style="max-height: 370px">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat Email</th>
                                                    <th>Nomor HP</th>
                                                    <th>Gender</th>
                                                    <th>Created at</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $tamu)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $tamu->name }}</td>
                                                        <td>{{ $tamu->email }}</td>
                                                        <td>{{ $tamu->nohp }}</td>
                                                        <td>{{ $tamu->gender }}</td>
                                                        <td>{{ $tamu->created_at }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Isi tab kunjungan --}}
                            <div class="tab-pane fade" id="kunjungan-tab-pane" role="tabpanel"
                                aria-labelledby="kunjungan-tab" tabindex="0">
                                <div class="card-body mb-2">
                                    <div class="overflow-auto m-2">
                                        {{-- Tabel grafik untuk banyaknya kunjungan ruangan --}}
                                        <div id="countRoomGraph"></div>


                                    </div>
                                </div>
                            </div>

                            {{-- Isi tab Waktu --}}
                            <div class="tab-pane fade" id="waktu-tab-pane" role="tabpanel" aria-labelledby="waktu-tab"
                                tabindex="0">
                                <div class="card-body mb-2">
                                    <div class="overflow-auto m-2">
                                        <div id="timeRoomGraph"> </div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('grafik')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('countRoomGraph', {
            chart: {
                type: 'column'
            },
            title: {
                text: `Ruangan yang sering dikunjungi`,
            },
            xAxis: {
                type: 'category',
                labels: {
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Kali'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Waktu : <b>{point.y} Kali</b>'
            },
            series: [{
                name: 'Waktu',
                colorByPoint: true,
                groupPadding: 0,
                data: [
                    ['Pintu', {{ $roomPintu }}],
                    ['Ruang Tamu Depan', {{ $roomRuangTamuDepan }}],
                    ['Ruang Makan', {{ $roomRuangMakan }}],
                    ['Halaman Depan', {{ $roomHalamanDepan }}],
                    ['Lantai 2', {{ $roomLantai2 }}],
                    ['Balkon', {{ $roomBalkon }}],
                    ['Kamar', {{ $roomKamar }}],
                    ['Toilet', {{ $roomToilet }}]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#000',
                    align: 'center',
                    format: '{point.y}', // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Poppins, sans-serif'
                    }
                }
            }]
        });
    </script>
    <script>
        Highcharts.chart('timeRoomGraph', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Waktu yang dihabiskan pengunjung pada tiap ruangan'
            },
            xAxis: {
                type: 'category',
                labels: {
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Waktu (Menit)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Waktu : <b>{point.y:.1f} Menit</b>'
            },
            series: [{
                name: 'Waktu',
                colorByPoint: true,
                groupPadding: 0,
                data: [
                    ['Pintu', {{ $timePintu }}],
                    ['Ruang Tamu Depan', {{ $timeRuangTamuDepan }}],
                    ['Ruang Makan', {{ $timeRuangMakan }}],
                    ['Halaman Depan', {{ $timeHalamanDepan }}],
                    ['Lantai 2', {{ $timeLantai2 }}],
                    ['Balkon', {{ $timeBalkon }}],
                    ['Kamar', {{ $timeKamar }}],
                    ['Toilet', {{ $timeToilet }}]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#000',
                    align: 'center',
                    format: '{point.y:.1f}', // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Poppins, sans-serif'
                    }
                }
            }]
        });
    </script>
    <script>
        $(document).ready(function() {
          $("#tanggal").datepicker();
        });
      </script>
@endsection
