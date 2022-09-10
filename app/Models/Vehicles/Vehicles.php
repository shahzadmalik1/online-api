<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $table = "vehicles";
    // protected $id = "id";
    protected $guarded = ['id'];
}
