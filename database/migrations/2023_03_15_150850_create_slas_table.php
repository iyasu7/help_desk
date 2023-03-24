<?php

use App\Models\User;
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
        Schema::create('slas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id');
            $table->string('main_consultant_name',45);
            $table->text('description')->nullable();
            $table->string('slug',1000);
            $table->string('image', 255)->nullable();
            $table->text('consultant_representative');
            $table->text('user_representative');
            $table->text('SLA_Status');
            $table->integer('status');
            $table->timestamps();
            $table->timestamp('expire_date')->nullable();
            
            //   consultant_name varchar
            //   SLA_date timestamp
            //   SLA_document file
            //   SLA_due_date timestamp
            //   consultant_representative varchar
            //   customer_representative varchar
            //   SLA_Status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slas');
    }
};
