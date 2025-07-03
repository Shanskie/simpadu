<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'prodi';
    protected $primaryKey = 'id'; // <--- tambahkan ini
    public $timestamps = false; // jika tabel tidak ada created_at/updated_at

    protected $fillable = [
        'nama', 'kaprodi', 'jurusan'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id', 'id_prodi');
    }
}
