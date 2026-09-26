<?php
<<<<<<< HEAD
=======

>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
    public function up(): void {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->date('month');
            $table->decimal('limit_amount', 12, 2);
            $table->timestamps();
            $table->unique(['user_id','category_id','month']);
        });
    }
    public function down(): void { Schema::dropIfExists('budgets'); }
};
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
              $table->foreignId('user_id');
              $table->foreignId('category_id');
              $table->decimal('limit_amount');
              $table->year('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
