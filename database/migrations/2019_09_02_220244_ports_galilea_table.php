<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @path database\migrations\2019_09_02_220244_ports_galilea_table
 * @author Cesar Verduzco Reyna <cesar.skyous@gmail.com> Alias Skyous
 * Class where the ports table is create with the command line migration, fields are specified in the method up
 * @version 1.0
 */
class PortsGalileaTable extends Migration
{
    /**
     * Run the migrations. Create ports table, columns or indexes into the database
     *
     * @return void
     */
    public function up()
    {
      /**
       * Schema is a facecade and here we call the method create
       * Here it is specified the table name with the first param is type string
       * The second param is a function where it has a param type Blueprint(object)
       */
        Schema::create('ports', function (Blueprint $table) {
          /**
           * [$table->bigIncrements] Here It is declared the column id_port type big Integer that autoincrements
           */
            $table->bigIncrements('id_port');
            /**
             * [$table->string] Here it is declared the column name_port type string
             * It saves the name of port that
             * This field it necessary to specify how many characters will use
             */
            $table->string('name_port',50);

            $table->string('port_code',10);
            /**
             * [$table->string] Here it is declared the column cordinates type string
             * It saves the cordinate that google api provide
             */
            $table->string('cordinates');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column country_id type unsignedBigInteger
             * It saves the id of the country that will correspond this data, is a foreign key
             */
            $table->unsignedBigInteger('country_id');
            /**
             * [$table->tinyInteger] Here it is declared the column status type status
             * It saves the status of this port, if is 1 is active and if is 0 is inactive
             */
            $table->tinyInteger('status')->default(1);
            /**
             * [$table->timestamps] Here it is declared the columns created_at and updated_at type TIMESTAMP
             * It saves when a port is created or updated
             */
            $table->timestamps();
            /**
             * [$table->softDeletes] Here it is declared the column delete_at type TIMESTAMP
             * It saves when a port has been changed the status for 0
             */
            $table->softDeletes();

            /**
             * [$table->foreign] Here it is created the relation with the table countries
             * The country_id referentes to id_country into the table countries
             */
            $table->foreign('country_id')->references('id_country')->on('countries');
        });
    }

    /**
     * Reverse the migrations. Delete the ports table if exits when a rollback or migration is used
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ports');
    }
}
