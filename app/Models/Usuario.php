<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request as ModelRequest;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'USER_';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];

    public function resquest(){
        return $this->hasMany(ModelRequest::class,'','id_request');
    }
}
