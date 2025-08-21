<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{

    protected $fillable = [
        'karyawan_id',
        'periode',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    protected static function booted()
    {
        static::creating(function ($payroll) {
            $payroll->total_gaji = $payroll->gaji_pokok + $payroll->tunjangan - $payroll->potongan;
        });
    }
}
