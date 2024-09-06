<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if (session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ sessions('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Makanan</label>
                                <input type="text" class="form-control" id="name" name="nama_makanan" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Singkat</label>
                                <input type="text" class="form-control" id="deskripsiSingkat" name="deskripsi_singkat" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsiSingkat" name="deskripsi" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Resep</label>
                                <textarea id="resep" name="resep" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto Makanan</label>
                                <input type="file" class="form-control-file" id="photo" name="file_path">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
