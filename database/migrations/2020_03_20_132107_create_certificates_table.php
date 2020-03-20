<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->foreignId('award_id');
            $table->string('name')->index();
            $table->string('text1');
            $table->string('text2');
            $table->string('text3');
            $table->string('text4');
            $table->string('text5');
            $table->string('text6');
            $table->string('text7');
            $table->string('text8');
            $table->timestamps();
            $table->boolean('isDelete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
