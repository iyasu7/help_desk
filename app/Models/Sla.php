<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;
    protected $fillable  = [
        'user_id',
        'main_consultant',
        'customers_representative_name',
        'description',
        'start_date',
        'expire_date',
        'file',
    ];
}
