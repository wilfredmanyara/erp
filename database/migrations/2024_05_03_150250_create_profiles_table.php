<?php

use App\Enums\EntityType;
use App\Models\Currency;
use Awcodes\Curator\Models\Media;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Media::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Currency::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('exchange_rate_api');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->enum('entity', EntityType::values())->default(EntityType::DEFAULT);
            $table->string('registration')->nullable();
            $table->string('kra_pin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
