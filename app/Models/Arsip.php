<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsip';
    protected $guarded = ['id_arsip'];
    protected $primaryKey = 'id_arsip';

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where('nomor_arsip', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }

    protected static function booted()
    {
        static::deleting(function ($arsip) {
            if ($arsip->upload) {
                Storage::delete('public/uploads/arsip/' . $arsip->upload);
            }
        });
    }
}
