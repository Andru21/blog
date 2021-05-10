<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request_Range;
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
    public function requestrange(){
        return $this->hasMany(Request_Range::class,'','id_request_range');
    }
}
