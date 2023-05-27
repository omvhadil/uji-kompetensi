@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-5 fw-bold text-center">Data gaji Karyawan</h1>

        <div class="row">
            <div class="col-4">
                <div class="card p-3 border-0 shadow-sm rounded-3">
                    <h5 class="mb-3">Tambahkan data karyawan</h5>
                    <form action="/create" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No Tlfn</label>
                            <input type="text" class="form-control" name="no_tlfn" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" aria-label="Default select example">
                                <option selected>Jabatan</option>
                                <option value="Kepala Lembaga">Kepala Lembaga</option>
                                <option value="Kepala Bidang">Kepala Bidang</option>
                                <option value="Staff Lembaga">Staff Lembaga</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

                <div class="card p-3 border-0 shadow-sm rounded-3 mt-3">
                    <h5 class="mb-3">Standar gaji karyawan</h5>
                    <ol style="font-size: .8rem;!important">
                        <li>
                            <div class="d-flex">
                                <h6>Kepala lembaga</h6>
                                <ul>
                                    <li>Gaji - 2.500.000</li>
                                    <li>Tunjangan - 1.500.000</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h6>Kepala bidang</h6>
                                <ul>
                                    <li>Gaji - 2.000.000</li>
                                    <li>Tunjangan - 1.000.000</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <h6>Staff lembaga</h6>
                                <ul>
                                    <li>Gaji - 1.500.000</li>
                                    <li>Tunjangan - 500.000</li>
                                </ul>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-8">
                <div class="card p-3 border-0 shadow-sm rounded-3">
                    <h5 class="mb-3">Tabel gaji karyawan</h5>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama karyawan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">No Telfon</th>
                                <th scope="col">Gaji</th>
                                <th scope="col">Tunjangan</th>
                                <th scope="col">Total Gaji</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->nama_karyawan }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->no_tlfn }}</td>
                                    <td>Rp. @rupiah($item->gaji)</td>
                                    <td>Rp. @rupiah($item->tunjangan)</td>
                                    <td>Rp. @rupiah($item->total_gaji)</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="/edit/{{ $item->id_gaji }}" class="btn btn-warning">✍</a>
                                            <form action="/{{ $item->id_gaji }}" method="post"
                                                onsubmit="return confirm('yaqin mau dihapus')">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="🗑" class="btn btn-danger">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
