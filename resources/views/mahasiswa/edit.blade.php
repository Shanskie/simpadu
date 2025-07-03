@extends('template.main')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('mahasiswa') }}">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Mahasiswa</h3>
                        </div>

                        <form action="{{ url('mahasiswa/' . $mahasiswa->nim) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" name="nim" id="nim"
                                        class="form-control @error('nim') is-invalid @enderror"
                                        value="{{ old('nim', $mahasiswa->nim) }}"disabled>
                                    @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (opsional)</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama', $mahasiswa->nama) }}">
                                    @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggalLahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggalLahir" id="tanggalLahir"
                                        class="form-control @error('tanggalLahir') is-invalid @enderror"
                                        value="{{ old('tanggalLahir', $mahasiswa->tanggalLahir) }}">
                                    @error('tanggalLahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="telp">Telepon</label>
                                    <input type="text" name="telp" id="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ old('telp', $mahasiswa->telp) }}">
                                    @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $mahasiswa->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_prodi">Program Studi</label>
                                    <select name="id_prodi" id="id_prodi"
                                        class="form-select @error('id_prodi') is-invalid @enderror">
                                        <option value="">-- Pilih Prodi --</option>
                                        @foreach($prodi as $p)
                                            <option value="{{ $p->id }}" {{ $mahasiswa->id_prodi == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto">Upload Foto (jika ingin mengganti)</label>
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror">
                                    @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    @if ($mahasiswa->foto)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa" width="100">
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ url('mahasiswa') }}" class="btn btn-secondary">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
