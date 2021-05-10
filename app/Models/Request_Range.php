<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request as ModelRequest;

class Request_Range extends Model
{
    use HasFactory;
    protected $table = 'REQUEST_RANGE';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];

    public function request(){
        return $this->belongsTo(ModelRequest::class,'id_request','id_request');
    }
}
