<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::create(['name' => 'Web Based Applications','description' => 'Designing, developing, and commissioning']);
        ServiceCategory::create(['name' => 'System Intergration','description' => 'Designing, implementing, operating, testing Data center']);
        ServiceCategory::create(['name' => 'Online Services','description' => 'Designing, developing, and maintaining e-service softwares']);
        ServiceCategory::create(['name' => 'Networking','description' => 'Designing, implementing, and maintaining computer and telecommunication networks']);
        ServiceCategory::create(['name' => 'ICT Training & Consultancy','description' => 'Providing standard ICT training and consultancy services']);
    }
}
