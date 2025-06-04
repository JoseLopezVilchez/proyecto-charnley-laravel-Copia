<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id_emisor', 'id_usuario', 'descripcion', 'id_imagen', 'id_sala'];

    public function emisor()
    {
        return $this->belongsTo(User::class, 'id_emisor');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'id_imagen');
    }
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'id_sala');
    }
}
