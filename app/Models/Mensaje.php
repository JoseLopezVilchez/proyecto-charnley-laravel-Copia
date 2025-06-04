<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id_sala',
        'id_sender',
        'content',
    ];

    public function sala() {
        return $this->belongsTo(Sala::class, 'id_sala');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'id_sender')->withTrashed();
    }
}
