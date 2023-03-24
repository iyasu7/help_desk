<?php

use App\Models\ServiceCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('service_category_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('service_category_id');
            $table->foreignIdFor(ServiceCategory::class, 'service_category_id');
            $table->string('name',100);
            $table->text('description',1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_types');
    }
};
