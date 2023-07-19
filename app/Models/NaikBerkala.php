<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NaikBerkala extends Model
{
    use HasFactory;

    protected $table = 'naik_berkalas';
    protected $fillable = [

        ];

    public function User() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function gaji_pns() : HasOne
    {
        return $this->hasOne(Gaji::class);
    }
}
