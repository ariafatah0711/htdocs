<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $fillable = [
        'user_id','nim','nama','gender',
        'divisi_id','jabatan_id','tmp_lahir',
        'tgl_lahir','hp','alamat','foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class,'pegawai_training')->withPivot('status')->withTimestamps();
    }
}
