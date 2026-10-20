<form action="{{ route('departments.update', $department) }}" method="POST">
    @csrf
    @method('PUT')

    <input name="name" class="form-control"
           value="{{ old('name', $department->name) }}" required>

    <button class="btn btn-primary mt-3">Update</button>
</form>

<select name="department_id" class="form-select" required>
    <option value="">Pilih Departemen</option>
    @foreach($departments as $d)
        <option value="{{ $d->id }}"
            @selected(old('department_id', $employee->department_id ?? '') == $d->id)>
            {{ $d->name }}
        </option>
    @endforeach
</select>

<input name="name" class="form-control mt-2"
       placeholder="Nama pegawai"
       value="{{ old('name', $employee->name ?? '') }}" required>

<input name="position" class="form-control mt-2"
       placeholder="Jabatan"
       value="{{ old('position', $employee->position ?? '') }}" required>

<input name="salary" type="number" min="0.01" step="0.01"
       class="form-control mt-2" placeholder="Gaji"
       value="{{ old('salary', $employee->salary ?? '') }}" required>

<input name="joined_at" type="date" class="form-control mt-2"
       value="{{ old('joined_at', $employee->joined_at ?? '') }}" required>