<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $informationFood->nama_makanan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Hafidz Kitchen</a>
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
  
        @if (Auth::check())
            
        <div class="d-flex">
          <a href="{{ route('informationUser') }}"><h4 style="color: white;">{{ auth::user()->username; }}</h4></a>
        </div>  
        
        @else

        <div class="d-flex">
          <a href="{{ route('register') }}"><button type="button" class="tombolDaftar btn btn-success me-2">Daftar</button></a>
          <a href="{{ route('login') }}"><button type="button" class="tombolLogin btn btn-primary">Login</button></a>
        </div>
            
        @endif
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

    <div class="container my-5">
        <h1 class="text-center mb-5">{{ $informationFood->nama_makanan }}</h1>

        <div  class="row">
            <div  class="col-md-6 mb-4">
                <img src="{{ asset('img/'.$informationFood->file_path) }}" class="img-fluid rounded w-100" alt="{{ $informationFood->nama_makanan }}">
            </div>
            <div  class="col-md-6">
              <form action="{{ route('cart') }}" method="POST">
                @csrf
                <input type="hidden" name="nama_makanan"  value="{{ $informationFood->nama_makanan }}">
                <input type="hidden" name="id_makanan"  value="{{ $informationFood->id }}">
                @if (auth()->check())
                <input type="hidden" name="user_id"  value="{{ auth()->user()->id }}">
                @endif
               
                <input type="hidden" name="harga"  value="{{ $informationFood->daftar_harga }}">
                <div class="card p-4">
                    <h2>Description</h2>
                    <p>{{ $informationFood->deskripsi }}</p>
                    
                    <h2>Harga</h2>
                    <p><strong>Rp </strong>{{ number_format($informationFood->daftar_harga) }}</p>

                    <h2>Jumlah</h2>
                    <input id="jumlahPesanan" name="jumlahPesanan" class="form-control mb-3" type="number" placeholder="Contoh: 123" required>

                    
                   <a href="{{ route('cart') }}"><button class="btn btn-dark w-100" type="submit">Pesan Sekarang</button></a> 
                  </form>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->check() && auth()->user()->hasRole('admin'))
        
    
    <form action="{{ route('delete', $informationFood->id) }}" method="POST">
      @csrf
      @method('delete')
    <button class="btnHapus floating-btn btn-danger bg-danger">
      <i class="">Hapus Makanan ?</i>
   </button>
  </form>

  <form action="{{ route('updateForm', $informationFood->id) }}" method="get">
    
  <button class="btnEdit floating-btn btn-warning bg-warning" >
      <i>Edit</i>
  </button>
</form>

@endif

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Hafidz Kitchen. All rights reserved.</p>
    </footer>

    
              </div>
              
              <!-- Bootstrap and script -->
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
              <script>


































//                   // Function to show the modal and set quantity value
//                   function showModal() {
//                       var jumlah = document.getElementById('jumlahPesanan').value;
//                       var harga = {{ $informationFood->daftar_harga }};
//                       var total = jumlah * harga;
              
//                       // Display jumlah and total harga in modal
//                       document.getElementById('jumlahPesananText').innerText = jumlah;
//                       document.getElementById('totalHarga').innerText = total.toLocaleString('id-ID');
              
//                       // Set the hidden input value for quantity
//                       document.getElementById('quantity').value = jumlah;
              
//                       // Show the modal
//                       var modal = new bootstrap.Modal(document.getElementById('confirmModal'));
//                       modal.show();
//                   }
            
              

//     function setQuantity() {
//     var quantity = document.getElementById('quantity').value;
//     document.getElementById('quantity').value = quantity;
// }

        // function confirmOrder() {
        //     alert("Pesanan Anda telah berhasil dipesan!");
        //     var modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
        //     modal.hide();
        // }
    </script>

    <style>
       .btnHapus {
        position: fixed;
        bottom: 20px; /* Jarak dari bawah */
        right: 20px;  /* Jarak dari kanan */
        z-index: 1000; /* Supaya berada di atas elemen lain */
        padding: 15px 20px;
        
        color: white;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        border: none;
    }

    a{
      text-decoration: none;
    }

    .btnHapus:hover {
        background-color: #0056b3;
        cursor: pointer;
    }

    .btnEdit {
        position: fixed;
        bottom: 20px; /* Jarak dari bawah */
        right: 200px;  /* Jarak dari kanan */
        z-index: 1000; /* Supaya berada di atas elemen lain */
        padding: 15px 20px;
        
        color: white;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        border: none;
    }

    .btnEdit:hover {
        background-color: #0056b3;
        cursor: pointer;
    }
    </style>
</body>

</html>
