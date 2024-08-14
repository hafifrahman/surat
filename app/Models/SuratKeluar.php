<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = "surat_keluar";
    protected $guarded = ['id_sk'];
    protected $primaryKey = 'id_sk';

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', '%' . $search . '%')
                ->orWhere('pengirim', 'like', '%' . $search . '%')
                ->orWhere('perihal', 'like', '%' . $search . '%');
        });
    }

    protected static function booted()
    {
        static::deleting(function ($suratKeluar) {
            if ($suratKeluar->upload) {
                Storage::delete('public/uploads/surat-keluar/' . $suratKeluar->upload);
            }
        });
    }
}
