<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileNaikBerkala extends Model
{
    use HasFactory;
    protected $table="file_naik_berkalas";
    protected $fillable=[
        'nama_berkas',
        'file_path_berkas'
    ];

    public function file() {
        return $this->belongsTo(User::class);
    }
}
