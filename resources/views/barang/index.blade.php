<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>

body {
  background-image: url("{{ asset('img/bg.jpg') }}");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  min-height: 100vh;
}

body::after {
  content: "";
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(255,255,255,0.35);
  z-index: -1;
}

.table-container {
  background-color: white;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}


    .bg {
      background-color: #1d5d8f;
    }

@font-face {
  font-family: 'ha';
  src: url("{{ asset('font/hanging/h.ttf') }}") format('truetype');
}
@font-face {
  font-family: 'sha';
  src: url("{{ asset('font/shadowed/s.ttf') }}") format('truetype');
}
.s {
  font-family: 'Sha';
}
.h {
  font-family: 'ha';
}

.button {
  background-color: #589dd3;
  color: white;
  padding: 10px 20px;
  display: inline-block;
  font-size: 16px;
  margin: 19px 2px;
  cursor: pointer;
}

.button:hover {
  background-color: rgb(243, 204, 181);
}
.submit-button {
  background-color: #bfe1f3;
  border: none;
  cursor: pointer;
  margin: 2px;
}
.delete-button {
  background-color: #d83e10;
  border: none;
  cursor: pointer;
  margin: 2px;
}
</style>
<body>
<div class="container mt-4">
    <h2 class="h" style ="color: #2d7081; font-weight: bold; font-size: 56px; text-align: center;">DATA BARANG</h2>

    <div class="table-container">
    <a href="{{ url('/barang/create') }}" class="btn button button-hover">+ Tambah Barang</a>

    @if (session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
    @endif

    <table class="table table-bordered" style="border-radius: 20px; overflow: hidden; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <thead class="bg" style="color: white; font-weight: bold; text-align: center; font-size: 18px;">
            <tr style="text-align: center;">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $b)
            <tr style="text-align: center;">
                <td>{{ $index + 1 }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->stok }}</td>
                <td>Rp {{ number_format($b->harga) }}</td>
                <td>
                    <a href="/barang/{{ $b->id }}/edit" class="btn submit-button">Edit</a>
                    <form action="/barang/{{ $b->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn delete-button" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
</body>
</html>