<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['id_img_asociada', 'id_paciente'];

    public function imagen(): BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'id_img_asociada');
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente')->withTrashed();
    }

    public function mensajes() {
        return $this->hasMany(Mensaje::class, 'id_sala');
    }

    public function usersSoporte(){
        return $this->belongsToMany(User::class, 'sala_user', 'sala_id', 'user_id');
    }

    public function ultimoMensaje()
    {
        return $this->hasOne(Mensaje::class, 'id_sala')->latestOfMany();
    }
}
