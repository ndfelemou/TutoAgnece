<?php

use App\Models\Option;
use App\Models\Property;
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
        Schema::create('option_property', function (Blueprint $table) {
            /**
             * Les deux clef etrangers option et bien (property)
             */
            $table->foreignIdFor(Option::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();

            /** Les deux clefs primaire mais qui sont composees */
            $table->primary(['option_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_property');
    }
};
