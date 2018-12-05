<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession',function ($table){
           $table   ->  increments('id');
           $table   ->  string('pro_name',20)->notNull();
           $table   ->  tinyInteger('protype_id')->notNull();
           $table   ->  string('teacher_ids',255)->notNull();
           $table   ->  string('description',255);
           $table   ->  string('cover_img',255);
           $table   ->  integer('view_count')->notNull()->default(500);
           $table   ->  timestamps();
           $table   ->  tinyInteger('sort')->notNull()->default(0);
           $table   ->  tinyInteger('duration');
           $table   ->  decimal('price',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession');
    }
}
