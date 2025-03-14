<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Belanja Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(252, 89, 13);
            font-family: Arial, sans-serif;
        }
        .container {
            background: linear-gradient( #ff9a9e, #fad0c4);
        }
        h2 {
            color: #ffffff;
            text-align: center;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ff758c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff3f66;
        }
        table {
            margin-top: 20px;
            background: #ffffff;
        }
        th {
            background-color: #ff758c;
            color: white;
        }
        .form-label {
            color: #ffffff;
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 2px solid #ff3f66;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Form Belanja Online</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <input type="text" class="form-control" name="customer" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Produk Pilihan</label>
                <div>
                    <input type="radio" name="produk" value="TV" required> TV
                    <br/>
                    <input type="radio" name="produk" value="Kulkas"> Kulkas
                    <br/>
                    <input type="radio" name="produk" value="Mesin Cuci"> Mesin Cuci
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Beli</label>
                <input type="number" class="form-control" name="jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="proses" value="Simpan">Simpan</button>
        </form>

        <?php
        $customer = $produk = $jumlah = $total_harga = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $customer = $_POST['customer'];
            $produk = $_POST['produk'];
            $jumlah = $_POST['jumlah'];

            $harga_produk = [
                "TV" => 3000000,
                "Kulkas" => 4000000,
                "Mesin Cuci" => 3500000
            ];
            $total_harga = $harga_produk[$produk] * $jumlah;
        }
        ?>

        <?php if (!empty($customer)) : ?>
            <h3 class="mt-4 text-center">Hasil Belanja</h3>
            <table class="table table-bordered text-center">
                <tr><th>Customer</th><td><?php echo htmlspecialchars($customer); ?></td></tr>
                <tr><th>Produk</th><td><?php echo htmlspecialchars($produk); ?></td></tr>
                <tr><th>Jumlah Beli</th><td><?php echo htmlspecialchars($jumlah); ?></td></tr>
                <tr><th>Total Harga</th><td>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></td></tr>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
