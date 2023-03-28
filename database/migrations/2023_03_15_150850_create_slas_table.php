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
            $table->string('main_consultant',45);
            $table->text('description')->nullable();
            $table->string('file', 255)->nullable();
            $table->text('customers_representative_name')->nullable();
            $table->text('SLA_Status')->nullable();
            $table->date('start_date');
            $table->date('expire_date');
            $table->timestamps();
            
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
