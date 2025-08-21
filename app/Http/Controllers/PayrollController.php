<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Payroll::with('karyawan');

        // filter search nama
        if ($request->filled('search')) {
            $query->whereHas('karyawan', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // filter bulan
        if ($request->filled('bulan')) {
            $query->whereMonth('periode', $request->bulan);
        }

        // filter tahun
        if ($request->filled('tahun')) {
            $query->whereYear('periode', $request->tahun);
        }

        $payrolls = $query->paginate(10);


        return view('payroll.index', [
            'payrolls' => $payrolls
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payroll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('payroll.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('payroll.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
