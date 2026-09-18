<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
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

.container {
  background-color: rgba(255, 255, 255, 0.65);
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  backdrop-filter: blur(8px);
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
  font-size: 4s0px;
}

.text {
  font-size: 20px;
  font-weight: bold;
  color: #2d7081;
}
.submit-button:hover, .restart-button:hover {
  background-color: rgb(216, 216, 216);
  color: white;
  font-weight: bold;
}
.submit-button {
  background-color: #bfe1f3;
  border: none;
  cursor: pointer;
  margin: 2px;
  font-weight: bold;
}
.restart-button {
  background-color: #fad570;
  border: none;
  cursor: pointer;
  margin: 2px;
  font-weight: bold;
}
</style>
<body>
<div class="container mt-4">
    <h2 class="s" style ="color: #2d7081; font-weight: bold; font-size: 36px; text-align: center;">Edit Data Barang</h2>
    

    <div class="form-container mt-4">
    <form action="{{ url('/barang/'.$barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="text">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="text">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="text">Stok</label>
            <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="text">Harga</label>
            <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control" required>
        </div>
        </div>
        <button type="submit" class="btn submit-button submit-button:hover, restart-button:hover">Update</button>
        <a href="{{ url('/barang') }}" class="btn restart-button submit-button:hover, restart-button:hover">Kembali</a>
    </form>
</div>
</body>
</html>