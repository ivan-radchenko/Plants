<?php

use App\Enums\Light;
use App\Enums\Wet;
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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID')->constrained('users');
            $table->string('name');
            $table->string('image',255);
            $table->integer('waterSummer');
            $table->integer('waterWinter');
            $table->integer('lightSummer');
            $table->integer('lightWinter');
            $table->enum('light',[Light::getEnums()]);
            $table->enum('wet',[Wet::getEnums()]);
            $table->text('notes')->nullable();
            $table->date('lastWatering')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
