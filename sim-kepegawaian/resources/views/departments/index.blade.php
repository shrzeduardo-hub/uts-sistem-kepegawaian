
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Departemen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Data Departemen</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tambah Departemen</a>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary mb-3">Data Pegawai</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>No</th><th>Departemen</th><th>Jumlah Pegawai</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($departments as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->employees_count }}</td>
                <td>
                    <a href="{{ route('departments.edit', $d) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('departments.destroy', $d) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus departemen?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-danger">Logout</button>
    </form>
</body>
</html>
