
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Departemen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Tambah Departemen</h2>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <label class="form-label">Nama Departemen</label>
        <input name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name') <p class="text-danger">{{ $message }}</p> @enderror
        <button class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</body>
</html>
