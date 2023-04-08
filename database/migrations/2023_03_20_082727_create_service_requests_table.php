<?php

use App\Models\User;
use App\Models\ServiceType;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->foreignId('service_type_id')->references('id')->on('service_types')->onDelete('cascade');
            // $table->foreignIdFor(User::class, 'user_id');
            // $table->foreignIdFor(ServiceCategory::class, 'service_category_id');
            // $table->foreignIdFor(ServiceType::class, 'service_type_id');
            $table->text('description');
            // $table->date('request date');
            $table->text('status')->nullable();
            // $table->foreignIdFor(User::class, 'user_id');
            $table->unsignedInteger('assigned_agent_id')->nullable();
            // $table->integer('Assigned To')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
