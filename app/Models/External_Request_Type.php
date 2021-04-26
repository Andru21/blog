<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_Request_Type extends Model
{
    use HasFactory;
    
    protected $table = 'EXTERNAL_REQUEST_TYPE';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];
}
