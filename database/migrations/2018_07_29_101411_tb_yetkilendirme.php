<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbYetkilendirme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE TABLE public."tb_yetkilendirme"
        (
          id serial NOT NULL,
          rol character varying(50),
          CONSTRAINT pk_yetkilendirme_id PRIMARY KEY (id)
        )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
