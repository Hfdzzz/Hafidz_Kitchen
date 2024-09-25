<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->nama_makanan }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    
    <div class="checkout-container">
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
        <h1>Checkout</h1>
        <div class="order-summary">
            <h2>Your Order</h2>
            
            <div class="summary-item">
                <span>{{ $data->nama_makanan }}</span>
                <p id="harga" data-harga="{{ $data->harga }}">
                    Rp {{ number_format($data->harga, 2) }}
                </p>
            </div>
            
            <div class="summary-item">
                <label for="jumlah">Jumlah Pesanan:</label>
                <form action="{{ route('purchase') }}" method="POST">
                    @csrf
                <input class="inputan" name="jumlahPesanan" type="number" id="jumlah" value="{{ $data->jumlah }}" min="1" onchange="hitungTotal()">
            </div>
        
            <div class="summary-item total">
                <span>Total Harga:</span>
                <p id="totalHarga">Rp 0</p>
            </div>
        </div>
        
        <div class="section">
            <h2>Billing Information</h2>
            <p><strong>Name:</strong> {{ auth()->user()->username }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Address:</strong> 123 Street, City, Country</p>
        </div>
        
       
            
            <input type="hidden" name="nama_makanan" value="{{ $data->nama_makanan }}">
            
           
            <button type="submit" class="checkout-button">Place Order</button>
        </form>
        
        <script>
            function hitungTotal() {
                var jumlah = document.getElementById('jumlah').value;
                var harga = document.getElementById('harga').getAttribute('data-harga');
        
                
                var total = jumlah * parseFloat(harga);
        
                document.getElementById('totalHarga').innerText = 'Rp ' + total.toLocaleString('id-ID', { minimumFractionDigits: 2 });
            }
        
           
            window.onload = hitungTotal;
        </script>
        
    <style src="resources\css\style.css">
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.inputan {
    width: 50px;
}

.checkout-container {
    background-color: white;
    width: 400px;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 24px;
    color: #333;
}

.section {
    margin-bottom: 30px;
}

.section h2 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #555;
}

p {
    font-size: 14px;
    margin-bottom: 10px;
    color: #333;
}

.order-summary {
    margin-bottom: 30px;
}

.order-summary h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
    color: #555;
}

.summary-item.total {
    font-weight: 500;
    font-size: 16px;
    color: #333;
}

.checkout-button {
    width: 100%;
    padding: 12px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.checkout-button:hover {
    background-color: #4cae4c;
}

    </style>
</body>
</html>
