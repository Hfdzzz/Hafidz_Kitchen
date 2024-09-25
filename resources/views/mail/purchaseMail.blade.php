<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank You for Your Order!</h1>
    <p>Hi {{ $user->username }},</p>
    <p>We have received your order:</p>
    <p><strong>Food Item:</strong> {{ $nama_makanan }}</p>
    <p><strong>Quantity:</strong> {{ $jumlahPesanan }}</p>
    <p><strong>Total Price:</strong> Rp {{ number_format($totalHarga, 2) }}</p>
    <p>Thank you for ordering with us!</p>
</body>
</html>
