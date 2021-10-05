@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Data Pengeluaran Kas</h1>
</div>

<div class="section-body">
  <div class="card">
    <form method="POST" action="{{ route('pengeluaran-kas.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Nama Akun</label>
          <select name="id_akun" id="id_akun" class="custom-select">
            <option value="none" disabled selected>- Nama Akun -</option>
            @foreach($akuns as $akun)
            <option value="{{$akun->id}}">{{$akun->nama_akun}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Jenis Pengeluaran</label>
          <select name="jenis_pengeluaran" id="seeAnotherField" class="custom-select">
            <option value="none" disabled selected>- Jenis Pengeluaran -</option>
            <option value="proyek">Proyek</option>
            <option value="nonproyek">Non Proyek</option>
          </select>
        </div>

        <div class="form-group kategoriFieldDiv">
          <label>Kategori</label>
          <select name="id_kategori" id="id_kategori" class="custom-select">
            <option value="none" disabled selected>- Kategori -</option>
            @foreach($kategories as $kategori)
            <option value="{{ $kategori->id }}">{{$kategori->nama_kategori}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group" id="otherFieldDiv">
          <label>Nama Proyek</label>
          <select name="id_proyek" id="id_proyek" class="custom-select">
            <option value="none" disabled selected>- Nama Proyek -</option>
            @foreach($proyeks as $proyek)
            <option value="{{ $proyek->id }}">{{ $proyek->nama_proyek }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group kategoriFieldDiv">
          <label>Jumlah</label>
          <input type="number" class="form-control" name="jumlah">
        </div>

        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tanggal_pengeluaran" required>
        </div>
        <div class="form-group">
          <label>Keterangan Pengeluaran</label>
          <textarea class="form-control @error('keterangan_pengeluaran') is-invalid @enderror"
            name="keterangan_pengeluaran" required>{{old('keterangan_pengeluaran')}}</textarea>
          @error('keterangan_pengeluaran')
          <span class="invalid-feedback" role="alert">
            <strong>{{$message}}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengeluaran-kas.index') }}" type="button" class="btn btn-danger">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection

@section('custom-js')
<script>
  $("#seeAnotherField").change(function() {
    if ($(this).val() == "proyek") {
      $('#otherFieldDiv').show();
    } else {
      $('#otherFieldDiv').hide();
    }

    if ($(this).val() == "nonproyek") {
      $('.kategoriFieldDiv').show();
    } else {
      $('.kategoriFieldDiv').hide();
    }
  });
  $("#seeAnotherField").trigger("change");
</script>
@endsection