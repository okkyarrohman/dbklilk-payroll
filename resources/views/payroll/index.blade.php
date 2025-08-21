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
                    {{-- <a href="{{ route('payrolls.export') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-file-export"></i> Export
                    </a> --}}

                    <!-- Tombol Tambah Payroll -->
                    <a href="{{ route('payroll.create') }}" class="btn btn-sm btn-info">
                        <i class="fas fa-plus"></i> Tambah Payroll
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Filter -->
                <form method="GET" action="{{ route('payroll.index') }}" class="mb-3">
                    <div class="row">
                        <!-- Search Nama -->
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari nama karyawan...">
                        </div>

                        <!-- Filter Bulan -->
                        <div class="col-md-3">
                            <select name="bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Filter Tahun -->
                        <div class="col-md-3">
                            <select name="tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                @for ($y = now()->year; $y >= now()->year - 5; $y--)
                                    <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Table -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Periode</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payrolls as $key => $payroll)
                            <tr>
                                <td>{{ $loop->iteration + ($payrolls->currentPage() - 1) * $payrolls->perPage() }}</td>
                                <td>{{ $payroll->karyawan->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($payroll->periode)->translatedFormat('F Y') }}</td>
                                <td>Rp {{ number_format($payroll->gaji_pokok, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($payroll->tunjangan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($payroll->potongan, 0, ',', '.') }}</td>
                                <td><b>Rp {{ number_format($payroll->total_gaji, 0, ',', '.') }}</b></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $payrolls->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    {{-- <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('payrolls.import') }}" method="POST" enctype="multipart/form-data">
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
    </div> --}}
@endsection
