<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
            'nip', 'name', 't_lahir', 'tgl_lahir', 'alamat',
            'jenis_kelamin', 'nohp', 'agama', 'status_kawin',
            'pendidikan', 'jumlah_anak', 'nik',
            'no_kk',
            'no_rek',
            'npwp',
            'no_bpjs',
            'no_karsu',
            'email',
            'password',
        ];


        //Relasi :

        public function kepegawaian_pns()
        {
            return $this->hasOne(Kepegawaian::class);
        }

        public function suami_istri()
        {
            return $this->hasOne(SuamiIstri::class);
        }

        public function anak_pns(): HasMany
        {
            return $this->hasMany(Anak::class);
        }


    // protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
