<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 20px; }
        .container { background: white; padding: 20px 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { color: #333; text-align: center; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; color: #555; }
        .form-group input[type="text"], 
        .form-group input[type="email"], 
        .form-group select, 
        .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .form-group textarea { resize: vertical; height: 80px; }
        .radio-group, .checkbox-group { display: flex; gap: 15px; flex-wrap: wrap; }
        .radio-group label, .checkbox-group label { font-weight: normal; }
        .btn-group { display: flex; gap: 10px; margin-top: 20px; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; color: white; flex: 1; }
        .btn-submit { background-color: #007bff; }
        .btn-submit:hover { background-color: #0056b3; }
        .btn-reset { background-color: #6c757d; }
        .btn-reset:hover { background-color: #5a6268; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Data Mahasiswa</h2>
    <form action="proses.php" method="POST">
        <div class="form-group">
            <label for="nim">NIM *</label>
            <input type="text" id="nim" name="nim" placeholder="Contoh: 231011001" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama *</label>
            <input type="text" id="nama" name="nama" placeholder="Contoh: Andi Pratama" required>
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi *</label>
            <select id="prodi" name="prodi" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin *</label>
            <div class="radio-group">
                <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label>Hobi *</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
                <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
                <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
                <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
            </div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat *</label>
            <textarea id="alamat" name="alamat" placeholder="Tuliskan alamat lengkap..." required></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">Kirim Data</button>
            <button type="reset" class="btn btn-reset">Reset</button>
        </div>
    </form>
</div>

</body>
</html>