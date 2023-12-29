<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->uuidMorphs('historiable');
            $table->nullableMorphs('causer');
            $table->string('event');
            $table->json('previous')->nullable();
            $table->json('changes')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('performed_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
