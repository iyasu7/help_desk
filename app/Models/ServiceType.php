<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_category_id',
        'name',
        'description',
    ];

    
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
