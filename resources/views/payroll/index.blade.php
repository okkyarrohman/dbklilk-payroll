@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-3">Payroll</h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Daftar Payroll</h3>
                <div>
                    <!-- Tombol Import -->
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-file-import"></i> Import
                    </button>

                    <!-- Tombol Export -->
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-file-export"></i> Export
                    </a>

                    <!-- Tombol Tambah Payroll -->
                    <a href="#" class="btn btn-sm btn-info">
                        <i class="fas fa-plus"></i> Tambah Payroll
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Periode</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data statis -->
                        <tr>
                            <td>1</td>
                            <td>Budi Santoso</td>
                            <td>Agustus 2025</td>
                            <td>Rp 5.000.000</td>
                            <td>Rp 1.000.000</td>
                            <td><b>Rp 6.000.000</b></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Aminah</td>
                            <td>Agustus 2025</td>
                            <td>Rp 4.500.000</td>
                            <td>Rp 800.000</td>
                            <td><b>Rp 5.300.000</b></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Andi Wijaya</td>
                            <td>Agustus 2025</td>
                            <td>Rp 6.000.000</td>
                            <td>Rp 500.000</td>
                            <td><b>Rp 6.500.000</b></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import Data Payroll</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
