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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->decimal('amount', 12, 2);
            $table->enum('type', ['income','expense']);
            $table->string('description')->nullable();
            $table->foreignId('ai_suggested_category')->nullable()->constrained('categories')->nullOnDelete();
            $table->date('date');
            $table->boolean('is_recurring')->default(false);
            $table->string('recurring_frequency')->nullable();
            $table->timestamps();
            $table->index(['user_id','date']);
        });
    }
    public function down(): void { Schema::dropIfExists('transactions'); }
};
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
>>>>>>> 5dab0819ecfe3decb616006f6774379b55e6e7d8
