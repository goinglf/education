<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question',function ($table){
            $table->increments('id');
            $table->string('question',255)->notNull();
            $table->tinyInteger('paper_id')->notNull();
            $table->tinyInteger('score')->notNull()->default(2);
            $table->string('options',255)->notNull();
            $table->string('answer',1)->notNull();
            $table->string('remark')->notNull();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
