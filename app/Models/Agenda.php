<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $guarded = ['id_agenda'];
    protected $primaryKey = 'id_agenda';

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where('nama_acara', 'like', "%{$search}%")
                ->orWhere('tempat', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }
}
