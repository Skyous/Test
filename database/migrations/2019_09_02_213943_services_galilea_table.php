<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @path database\migrations\2019_09_02_213943_services_galilea_table
 * @author Cesar Verduzco Reyna <cesar.skyous@gmail.com> Alias Skyous
 * Class where the services table is created with the command line migration, field are specified in the method up
 * @version 1.0
 */
class ServicesGalileaTable extends Migration
{
    /**
     * Run the migrations.
     * Create services table, columns or indexes into the database
     * @return void
     */
    public function up()
    {
        /**
         * Schema is a facecade and here we call the method create
         * Here it is specified the table name with the first param and it is type string
         * The second param is a funciton where it has a param type Blueprint(object)
         */
        Schema::create('services', function (Blueprint $table) {
            /**
             * [$table->bigIncrements] Here it is declared the column id_service type big Integer that auto increments
             */
            $table->bigIncrements('id_service');
            /**
             * [$table->string] Here it is declared the columnd name_service type string
             * it saves the name of the adicional services
             */
            $table->string('service_name');
            /**
             * [$table->string] Here it is declared the column service_description type String
             * It saves an extra info about this service
             */
            $table->string('service_description');
            /**
             * [$table->tinyInteger] Here it is declared the column status type tiny integer
             * By default is 1 that it means that is active, if it is 0 it means that is inactive
             */
            $table->tinyInteger('status')->default(1);
            /**
             * [$table->timestamps] Here it is declared the column created_at and updated_at type TIMESTAMP
             * It saves date when a service is created or updated
             */
            $table->timestamps();
            /**
             * [$table->softDeletes] Here it is declared the column delete_at type TIMESTAMP
             * It saves date when a service status has been changed to 0
             */
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations. Delete the services table if exits when a rollback or migration is used
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
