@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto pt-5">
                <div class="card border-0 shadow-sm rounded-3 p-3">
                    <h5 class="mb-3">Update data</h5>
                    <form action="/update/{{ $data->id_gaji }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" value="{{ $data->nama_karyawan }}"
                                name="nama_karyawan" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Telefon</label>
                            <input type="text" class="form-control" value="{{ $data->no_tlfn }}" name="nama_karyawan"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" aria-label="Default select example">
                                <option value="Kepala Lembaga" {{ $data->jabatan == 'Kepala Lembaga' ? 'selected' : '' }}>
                                    Kepala Lembaga</option>
                                <option value="Kepala Bidang" {{ $data->jabatan == 'Kepala Bidang' ? 'selected' : '' }}>
                                    Kepala Bidang</option>
                                <option value="Staff Lembaga" {{ $data->jabatan == 'Staff Lembaga' ? 'selected' : '' }}>
                                    Staff Lembaga</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
