@extends('layouts.sbadmin')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading mb-40">
    <h3 class="ms-5">Dashboard Statistik</h3>
</div>

<div class="row">
    <!-- Statistik Cards -->
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                    <i class="bi bi-people-fill fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Jumlah Siswa</h6>
                    <h4 class="fw-bold mb-0">{{ $jumlahSiswa }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-success text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                    <i class="bi bi-person-badge-fill fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Jumlah Guru</h6>
                    <h4 class="fw-bold mb-0">{{ $jumlahGuru }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-danger text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                    <i class="bi bi-cash-coin fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Total Pembayaran</h6>
                    <h4 class="fw-bold mb-0">Rp {{ number_format($totalPembayaran,0,',','.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 bg-info text-white rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                    <i class="bi bi-receipt fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Jumlah Transaksi</h6>
                    <h4 class="fw-bold mb-0">{{ $jumlahTransaksi }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Grid -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-header">
                <h5 class="fw-bold mb-0">Pembayaran Per Bulan</h5>
            </div>
            <div class="card-body">
                <div id="chart-pembayaran"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-header">
                <h5 class="fw-bold mb-0">Jumlah Transaksi Per Bulan</h5>
            </div>
            <div class="card-body">
                <div id="chart-transaksi"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-header">
                <h5 class="fw-bold mb-0">Distribusi Siswa Per Tahun</h5>
            </div>
            <div class="card-body">
                <div id="chart-siswa"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm rounded-4">
            <div class="card-header">
                <h5 class="fw-bold mb-0">Distribusi Guru Per Mapel</h5>
            </div>
            <div class="card-body">
                <div id="chart-guru"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Bar Chart Pembayaran
    new ApexCharts(document.querySelector("#chart-pembayaran"), {
        series:[{ name: 'Total Pembayaran', data: @json($pembayaranPerBulan) }],
        chart:{ type: 'bar', height: 350 },
        xaxis:{ categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] },
        colors:['#435ebe']
    }).render();

    // Line Chart Transaksi
    new ApexCharts(document.querySelector("#chart-transaksi"), {
        series:[{ name: 'Jumlah Transaksi', data: @json($transaksiPerBulan) }],
        chart:{ type: 'line', height: 350 },
        xaxis:{ categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] },
        colors:['#f39c12']
    }).render();

    // Donut Chart Siswa
    new ApexCharts(document.querySelector("#chart-siswa"), {
        series: Object.values(@json($jumlahSiswaPerTahun)),
        chart:{ type: 'donut', height: 350 },
        labels: Object.keys(@json($jumlahSiswaPerTahun)),
        colors:['#1abc9c','#16a085','#2ecc71','#27ae60','#3498db','#2980b9'],
    }).render();

    // Pie Chart Guru
    new ApexCharts(document.querySelector("#chart-guru"), {
        series: Object.values(@json($jumlahGuruPerMapel)),
        chart:{ type: 'pie', height: 350 },
        labels: Object.keys(@json($jumlahGuruPerMapel)),
        colors:['#e74c3c','#c0392b','#f1c40f','#f39c12','#9b59b6','#8e44ad'],
    }).render();
</script>
@endpush
