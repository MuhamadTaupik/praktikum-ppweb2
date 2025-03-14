<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Penilaian</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <input type="text" class="form-control" name="matkul" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai UTS</label>
                <input type="number" class="form-control" name="nilai_uts" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai UAS</label>
                <input type="number" class="form-control" name="nilai_uas" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai Tugas</label>
                <input type="number" class="form-control" name="nilai_tugas" required>
            </div>
            <button type="submit" class="btn btn-primary" name="proses" value="Hitung">Hitung</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $proses = isset($_POST['proses']) ? $_POST['proses'] : "";
            $nama_siswa = isset($_POST['nama']) ? $_POST['nama'] : "";
            $mata_kuliah = isset($_POST['matkul']) ? $_POST['matkul'] : "";
            $nilai_uts = isset($_POST['nilai_uts']) ? (float)$_POST['nilai_uts'] : 0;
            $nilai_uas = isset($_POST['nilai_uas']) ? (float)$_POST['nilai_uas'] : 0;
            $nilai_tugas = isset($_POST['nilai_tugas']) ? (float)$_POST['nilai_tugas'] : 0;
    
            $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);
    
            $status = ($nilai_akhir > 55) ? "Lulus" : "Tidak Lulus";
    
            if ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
                $grade = "A";
            } elseif ($nilai_akhir >= 70 && $nilai_akhir < 85) {
                $grade = "B";
            } elseif ($nilai_akhir >= 56 && $nilai_akhir < 70) {
                $grade = "C";
            } elseif ($nilai_akhir >= 36 && $nilai_akhir < 56) {
                $grade = "D";
            } elseif ($nilai_akhir >= 0 && $nilai_akhir < 36) {
                $grade = "E";
            } else {
                $grade = "I";
            }
    
            switch ($grade) {
                case "A":
                    $predikat = "Sangat Memuaskan";
                    break;
                case "B":
                    $predikat = "Memuaskan";
                    break;
                case "C":
                    $predikat = "Cukup";
                    break;
                case "D":
                    $predikat = "Kurang";
                    break;
                case "E":
                    $predikat = "Sangat Kurang";
                    break;
                default:
                    $predikat = "Tidak Ada";
                    break;
            }

            echo "<h3 class='mt-4'>Hasil Penilaian</h3>";
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Proses</th><td>$proses</td></tr>";
            echo "<tr><th>Nama</th><td>$nama_siswa</td></tr>";
            echo "<tr><th>Mata Kuliah</th><td>$mata_kuliah</td></tr>";
            echo "<tr><th>Nilai UTS</th><td>$nilai_uts</td></tr>";
            echo "<tr><th>Nilai UAS</th><td>$nilai_uas</td></tr>";
            echo "<tr><th>Nilai Tugas</th><td>$nilai_tugas</td></tr>";
            echo "<tr><th>Nilai Akhir</th><td>$nilai_akhir</td></tr>";
            echo "<tr><th>Status</th><td>$status</td></tr>";
            echo "<tr><th>Grade</th><td>$grade</td></tr>";
            echo "<tr><th>Predikat</th><td>$predikat</td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
