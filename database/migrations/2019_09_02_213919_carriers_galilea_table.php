<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @path database\migrations\2019_09_02_213919_carriers_galilea_table
 * @author Cesar Verduzco Reyna <cesar.skyous@gmail.com> Alias Skyous
 * Class where the carriers table is created with the command line migration, fields are specified in the method up
 * @version 1.0
 */
class CarriersGalileaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Schema is a facecade and here we call the method create
         * Here it is specified the table name with the first param is type string
         * The second param is a function where it has a param type Blueprtin (object)
         */
        Schema::create('carriers', function (Blueprint $table) {
            /**
             * [$table->bigIncrements] Here it is declared the column id_carrier type big Integer that auto increments
             */
            $table->bigIncrements('id_carrier');
            /**
             * [$table->string] Here it is declared the column carrier_name type string
             * It saves the carrier name or sealine, needs to be checked
             */
            $table->string('carrier_name');

            //definir  si es carrier or airlane por tipo o separados aun esta por verse
            $table->string('type_carrier');
            /**
             * [$table->string] Here it is declared the column carrier_description type string
             * It saves the description of the user wanna point
             */
            $table->string('carrier_description');

            /**
             * [$table->tinyInteger] Here it is declared the column status type tinyInteger
             * If it is 1 is active and if it is 0 is inactive]
             */
            $table->tinyInteger('status')->default(1);
            /**
             * [$table->unsignedInteger] Here it is declared the column user_id type unsigned Integer
             * It saves the id user that belongs to this carrier, it is a foreign key
             */
            $table->unsignedInteger('user_id');
            /**
             * [$table->timestamps] Here it is declared the columns create_at and updated_at type TIMESTAMP
             * It saves when a carrier is created or updated
             */
            $table->timestamps();
            /**
             * [$table->softDeletes] Here it is declared the columns delete_at type TIMESTAMP
             * It saves when the status carrier has been changed to 0
             */
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations. Delete the carriers table if exits when a rollback or migration is used
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carriers');
    }
}
