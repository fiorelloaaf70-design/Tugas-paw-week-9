<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Penghuni Kos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f6f9; }
        form { background: white; padding: 20px; border-radius: 8px; width: 500px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 10px 15px; background: #ffc107; color: #000; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-back { background: #6c757d; text-decoration: none; display: inline-block; padding: 8px 12px; color: white; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>Form Edit Penghuni Kos</h2>
    <a href="{{ route('penghuni.index') }}" class="btn-back">&larr; Kembali</a>

    <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" value="{{ $penghuni->nama }}" required>
        </div>
        <div class="form-group">
            <label>No. Identitas (KTP/KTM):</label>
            <input type="text" name="identitas" value="{{ $penghuni->identitas }}" required>
        </div>
        <div class="form-group">
            <label>Pekerjaan:</label>
            <input type="text" name="pekerjaan" value="{{ $penghuni->pekerjaan }}" required>
        </div>
        <div class="form-group">
            <label>No. Telepon:</label>
            <input type="text" name="telp" value="{{ $penghuni->telp }}" required>
        </div>
        <button type="submit" class="btn">Perbarui Data</button>
    </form>
</body>
</html>