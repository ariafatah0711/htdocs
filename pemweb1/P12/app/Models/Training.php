<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [
        'jenis_training_id','nama_training',
        'penyelenggara','tanggal_training','lokasi'
    ];

    public function jenisTraining()
    {
        return $this->belongsTo(JenisTraining::class);
    }

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class,'pegawai_training')->withPivot('status')->withTimestamps();
    }
}
