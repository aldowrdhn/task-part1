<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasMany(karyawan::class, 'pendidikans_id', 'id');
    }
}
