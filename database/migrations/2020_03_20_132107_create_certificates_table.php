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
            $table->foreignId('creator');
            $table->string('name')->index();
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('text4')->nullable();
            $table->string('text5')->nullable();
            $table->string('text6')->nullable();
            $table->string('text7')->nullable();
            $table->string('text8')->nullable();
            $table->timestamps();
            $table->softDeletes(0);

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
