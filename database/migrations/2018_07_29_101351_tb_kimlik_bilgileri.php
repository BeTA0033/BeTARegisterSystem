<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbKimlikBilgileri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE TABLE public."tb_kimlik_bilgileri"
        (
          id serial NOT NULL ,
          no character varying(50) NOT NULL,
          ad character varying(50) NOT NULL,
          soyad character varying(50)NOT NULL,
          telefon character varying(50),
          adres character varying(250),
          CONSTRAINT pk_kimlik_id PRIMARY KEY (id)
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
