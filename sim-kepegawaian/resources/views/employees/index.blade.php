
@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2>Data Pegawai</h2>
        <p class="text-muted">Daftar seluruh pegawai perusahaan.</p>
    </div>

    <a href="{{ route('employees.create') }}" class="btn btn-primary">
        + Tambah Pegawai
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Tanggal Bergabung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>
                            Rp {{ number_format($employee->salary, 0, ',', '.') }}
                        </td>
                        <td>{{ $employee->joined_at }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('employees.destroy', $employee) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pegawai ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data pegawai.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
