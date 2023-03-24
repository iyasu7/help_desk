<?php

namespace App\Models;

use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];


    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class);
    }
}
