<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangedValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('changed_values', function (Blueprint $table) {
            $table->id();
            $table->string('model_name')->index();
            $table->unsignedBigInteger('model_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('key');
            $table->integer('bulk');
            $table->longText('old_value');
            $table->longText('new_value');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('changed_values');
    }
}
