<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 20px; }
        .container { background: white; padding: 20px 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 600px; }
        h2 { color: #333; text-align: center; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb; text-align: center; font-weight: bold;}
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; width: 30%; }
        .btn-back { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; }
        .btn-back:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil Data Mahasiswa</h2>

    <?php
    // 1. AMBIL DATA DARI FORM (METODE POST)
    $nim            = trim($_POST['nim'] ?? '');
    $nama           = trim($_POST['nama'] ?? '');
    $email          = trim($_POST['email'] ?? '');
    $prodi          = trim($_POST['prodi'] ?? '');
    $jenis_kelamin  = trim($_POST['jenis_kelamin'] ?? '');
    $hobi           = $_POST['hobi'] ?? []; // Array karena checkbox
    $alamat         = trim($_POST['alamat'] ?? '');

    $errors = [];

    // 2. VALIDASI DATA (Sesuai Catatan Validasi pada Slide)
    
    // Validasi NIM: 8-12 digit angka
    if (!preg_match('/^[0-9]{8,12}$/', $nim)) {
        $errors[] = "NIM harus 8-12 digit angka!";
    }

    // Validasi Nama: minimal 3 karakter, hanya huruf dan spasi
    if (!preg_match('/^[a-zA-Z\s]{3,}$/', $nama)) {
        $errors[] = "Nama minimal 3 karakter dan hanya boleh huruf!";
    }

    // Validasi Email menggunakan filter_var
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid!";
    }

    // Validasi Program Studi
    if (empty($prodi)) {
        $errors[] = "Program Studi harus dipilih!";
    }

    // Validasi Jenis Kelamin
    if (empty($jenis_kelamin)) {
        $errors[] = "Jenis Kelamin wajib dipilih!";
    }

    // Validasi Hobi (minimal pilih satu)
    if (empty($hobi)) {
        $errors[] = "Hobi bisa lebih dari satu pilihan, minimal pilih satu!";
    }

    // Validasi Alamat
    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong!";
    }

    // 3. TAMPILKAN ERROR ATAU HASIL
    if (!empty($errors)) {
        // Jika ada error, tampilkan pesan error
        echo '<div class="alert-danger">';
        echo '<strong>Terjadi Kesalahan:</strong><ul>';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
        // REVISI: Mengubah form_mahasiswa.php menjadi form.php
        echo '<a href="form.php" class="btn-back">Kembali ke Form</a>';
    } else {
        // 4. SANITASI DATA (Mencegah XSS)
        $nim            = htmlspecialchars($nim, ENT_QUOTES, 'UTF-8');
        $nama           = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        $email          = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $prodi          = htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8');
        $jenis_kelamin  = htmlspecialchars($jenis_kelamin, ENT_QUOTES, 'UTF-8');
        $alamat         = htmlspecialchars($alamat, ENT_QUOTES, 'UTF-8');
        
        // Sanitasi array Hobi
        $hobi_sanitized = array_map(function($h) {
            return htmlspecialchars($h, ENT_QUOTES, 'UTF-8');
        }, $hobi);
        $hobi_string = implode(', ', $hobi_sanitized);

        // 5. TAMPILKAN HASIL (Tabel)
        echo '<div class="alert-success">Data Mahasiswa Berhasil Disimpan</div>';
        echo '<table>';
        echo '<tr><th>NIM</th><td>' . $nim . '</td></tr>';
        echo '<tr><th>Nama</th><td>' . $nama . '</td></tr>';
        echo '<tr><th>Email</th><td>' . $email . '</td></tr>';
        echo '<tr><th>Program Studi</th><td>' . $prodi . '</td></tr>';
        echo '<tr><th>Jenis Kelamin</th><td>' . $jenis_kelamin . '</td></tr>';
        echo '<tr><th>Hobi</th><td>' . $hobi_string . '</td></tr>';
        echo '<tr><th>Alamat</th><td>' . nl2br($alamat) . '</td></tr>';
        echo '</table>';
        // REVISI: Mengubah form_mahasiswa.php menjadi form.php
        echo '<a href="form.php" class="btn-back">Input Data Lagi</a>';
    }
    ?>

</div>

</body>
</html>