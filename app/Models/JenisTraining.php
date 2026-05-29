<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisTraining extends Model
{
    protected $table = 'jenis_trainings';
    protected $fillable = ['nama_jenis'];

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
