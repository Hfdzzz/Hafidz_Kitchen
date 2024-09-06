<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hafidz Kitchen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Hafidz Kitchen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex flex-grow-1 me-2" role="search">
          <div class="input-group w-100">
            <span class="input-group-text bg-white border-end-0">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="search" class="form-control border-start-0" placeholder="Cari apa?" aria-label="Search">
          </div>
        </form>
  
        <div class="d-flex">
          <a href="{{ route('register') }}"><button type="button" class="tombolDaftar btn btn-success me-2">Daftar</button></a>
          <a href="{{ route('login') }}"><button type="button" class="tombolLogin btn btn-primary">Login</button></a>
        </div>
      </div>
    </div>
  </nav>

    @if (session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <!-- Card  -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/zzz.png') }}" class="thumbnail card-img-top" alt="Bomboloni">
                    <div class="card-body">
                        <h5 class="card-title">Bomboloni</h5>
                        <p class="card-text">Lezat dan lembut, bomboloni kami adalah pilihan sempurna untuk pencuci mulut.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
            
           {{-- penutup card --}}

           @foreach ($registerMakanan as $item)

           <div class="cardInfo col-md-4 mt-3">
            <div class="card">
                <img src="{{ asset('img/'. $item->file_path) }}" class="img-fluid card-img-top" alt="Bomboloni">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_makanan }}</h5>
                    <p class="card-text">{{ $item->deskripsi_singkat }}</p>
                    <a href="{{ url('/Information/'.$item->id) }}" class="btn btn-primary">Info</a>
                </div>
            </div>
        </div>
               
           @endforeach

            
        </div>
    </div>

    <a href="{{ route('registMakanan') }}"><button class="floating-btn">
     <i class="fas fa-plus"></i> <!-- Ikon dari Font Awesome (opsional) -->
  </button></a>

  <style>
    /* CSS untuk tombol mengapung */
    .floating-btn {
        position: fixed;
        bottom: 20px; /* Jarak dari bawah */
        right: 20px;  /* Jarak dari kanan */
        z-index: 1000; /* Supaya berada di atas elemen lain */
        padding: 15px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        border: none;
    }

    .floating-btn:hover {
        background-color: #0056b3;
        cursor: pointer;
    }

    .card-img-top {
    width: 100%;
    height: 200px; /* Atur tinggi yang sama untuk semua gambar */
    object-fit: cover; /* Memotong bagian gambar yang tidak sesuai tanpa mengubah proporsinya */
}

    

    .tombolLogin {
      margin-left: 10px;
    }

    .tombolDaftar:hover {
      color: green;
      background-color: white;
    }

    .tombolLogin:hover {
      color: blue;
      background-color: white;
    }

    .cardInfo:hover {
      transform: scale(1.05);
    }

    
</style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
