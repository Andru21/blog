<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Request extends Model
{
    use HasFactory;

    protected $table = 'REQUEST';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_user','id_user');
    }
}
