<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateGigsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('gigs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description');
                $table->string('url');
                $table->text('images');
                $table->boolean('published');
                $table->integer('likes');
                $table->integer('hits');
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
            Schema::drop('gigs');
        }
    }
