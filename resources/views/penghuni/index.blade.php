<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kos - Daftar Penghuni</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h2 { color: #333; }
        .btn { padding: 8px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 15px; }
        .btn-warning { background: #ffc107; color: #000; }
        .btn-danger { background: #dc3545; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        .alert { padding: 12px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>

    <h2>Data Penghuni Kos</h2>

    <a href="{{ route('penghuni.create') }}" class="btn">+ Tambah Penghuni Baru</a>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Identitas</th>
                <th>Kamar</th>
                <th>Telp</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penghuni as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->identitas }}</td>
                <td>{{ $p->kamar }}</td>
                <td>{{ $p->telp }}</td>
                <td style="text-align: center;">
                    <a href="{{ route('penghuni.edit', $p->id) }}" class="btn btn-warning">Edit</a>

                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <form action="{{ route('penghuni.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>