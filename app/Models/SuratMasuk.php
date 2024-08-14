<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $guarded = ['id_sm'];
    protected $primaryKey = 'id_sm';

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', "%{$search}%")
                ->orWhere('penerima', 'like', "%{$search}%")
                ->orWhere('perihal', 'like', "%{$search}%");
        });
    }

    protected static function booted()
    {
        static::deleting(function ($suratMasuk) {
            if ($suratMasuk->upload) {
                Storage::delete('public/uploads/surat-masuk/' . $suratMasuk->upload);
            }
        });
    }
}
