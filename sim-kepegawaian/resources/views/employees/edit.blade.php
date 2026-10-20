
@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning">
        <h5 class="mb-0">Edit Data Pegawai</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('employees.update', $employee) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Pegawai</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $employee->name) }}"
                    required
                >
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select name="department_id" class="form-select" required>
                    <option value="">-- Pilih Departemen --</option>

                    @foreach($departments as $department)
                        <option
                            value="{{ $department->id }}"
                            @selected(old('department_id', $employee->department_id) == $department->id)
                        >
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input
                    type="text"
                    name="position"
                    class="form-control"
                    value="{{ old('position', $employee->position) }}"
                    required
                >
                @error('position')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gaji</label>
                <input
                    type="number"
                    name="salary"
                    class="form-control"
                    min="0.01"
                    step="0.01"
                    value="{{ old('salary', $employee->salary) }}"
                    required
                >
                @error('salary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Bergabung</label>
                <input
                    type="date"
                    name="joined_at"
                    class="form-control"
                    value="{{ old('joined_at', $employee->joined_at) }}"
                    required
                >
                @error('joined_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('employees.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection
