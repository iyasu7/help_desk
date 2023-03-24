<?php

namespace Database\Seeders;

use App\Models\ServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        ServiceType::create(['service_category_id'=>'1','name' => 'ERP packages','description' => 'Designing, developing, and commissioning']);
        ServiceType::create(['service_category_id'=>'2','name' => 'Designing','description' => 'Designing Data center']);
        ServiceType::create(['service_category_id'=>'3','name' => 'Developing','description' => 'Developing e-service softwares']);
        ServiceType::create(['service_category_id'=>'2','name' => 'Testing','description' => 'Testing Data center']);
        ServiceType::create(['service_category_id'=>'5','name' => 'ICT Training','description' => 'Providing standard ICT training']);
    }
}
