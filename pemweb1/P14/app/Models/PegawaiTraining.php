<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PegawaiTraining extends Model
{
    protected $table = 'pegawai_training';
    protected $fillable = [
        'pegawai_id',
        'training_id',
        'status',
    ];
}
