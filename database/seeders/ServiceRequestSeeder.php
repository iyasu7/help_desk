<?php

namespace Database\Seeders;

use App\Models\ServiceRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceRequest::create(['user_id' => 1,'service_category_id' => 2,'service_type_id' => 2,'description' => 'create a service request with task need to be handeled and take Surveys','status' => 0,'assigned_agent_id' => 4]);
        // ServiceRequest::create(['user_id' => 2,'service_category_id' => 3,'service_type_id' => 4,'description' => 'create a service request with task need to be handeled and take Surveys','status' => 1,'assigned_agent_id' => 2]);
        // ServiceRequest::create(['user_id' => 3,'service_category_id' => 2,'service_type_id' => 2,'description' => 'create a service request with task need to be handeled and take Surveys','status' => 0,'assigned_agent_id' => 3]);
        // ServiceRequest::create(['user_id' => 4,'service_category_id' => 3,'service_type_id' => 4,'description' => 'create a service request with task need to be handeled and take Surveys','status' => 1,'assigned_agent_id' => 1]);

    }
}
