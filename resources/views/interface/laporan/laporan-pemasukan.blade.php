@extends('layouts.app')

@section('additional-css')
<style>
  .header-menus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 32%;
    padding-right: 2%;
  }
</style>
@endsection

@section('content')
<div class="section-header">
  <h1>Laporan Pemasukan Kas</h1>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('laporan-pemasukan.result') }}" method="GET">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-5">
                <input type="date" name="dari" class="form-control" required>
              </div>
              <div class="col-2 d-flex align-items-center justify-content-center">
                <p class="text-center mb-0">S / D</p>
              </div>
              <div class="col-5">
                <input type="date" name="sampai" class="form-control" required>
              </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
              <button type="submit" class="btn btn-lg btn-primary">Tampilkan</button>
            </div>
          </div>
        </form>
      </div>

      @if (isset($pemasukans))
      <div class="card">
        <div class="row py-3">
          <div class="col-12 text-center">
            <div class="header-menus">
              <h4>PT. SAPUTRA TIRTHA AMERTHA</h4>
              <button class="btn btn-icon btn-warning"><i class="fas fa-file-download"
                  style="font-size: 18px"></i></button>
            </div>
            <h5>Jalan Kecumbung No. 38</h5>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pemasukans as $pemasukan)
              <tr>
                <th scope="row">{{ date( 'd/m/Y', strtotime($pemasukan->tanggal_pemasukan)) }}</th>
                <td>{{ $pemasukan->dataproyek->customer->nama_customer }}</td>
                <td>{{ $pemasukan->keterangan_pemasukan }}</td>
                <td>{{ number_format($pemasukan->dataproyek->total_bayar, 0, ',', '.') }}</td>
              </tr>
              @endforeach
              <tr>
                <th colspan="3">Total</th>
                <td>{{ number_format($total, 0, ',', '.') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection