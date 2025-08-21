<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'hris_id',
        'nip',
        'nama',
        'email',
        'telepon',
        'divisi',
        'sub_divisi',
        'cabang',
        'tanggal_mulai',
        'tanggal_akhir',
    ];

    /**
     * Relasi ke Payroll
     * Satu Karyawan punya banyak Payroll.
     */
    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'karyawan_id');
    }
}
