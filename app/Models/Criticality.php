<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criticality extends Model
{
    use HasFactory;
    protected $table = 'criticality';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];
}
