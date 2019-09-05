<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @path database\migrations\2019_09_02_213843_countries_galilea_table
 * @author Cesar Verduzco Reyna <cesar.skyous@gmail.com> Alias Skyous
 * Class where you can create table countries with migration, fields are specified in the method up
 * @extends Migration
 * @version 1.2
 */
class CountriesGalileaTable extends Migration
{
    /**
     * Run the migrations. Create countries table, columns or indexes into the database
     *
     * @return void
     */
    public function up()
    {
        /**
         * Schema is a facade and has the method create
         * Here you specified the table name with the first param is type string
         * The second param is a function where it has a param type Blueprint (object)
         */
        Schema::create('countries', function (Blueprint $table) {
            /**
             * Here we declare the column id_country type big Integer that autoincrements
             */
            $table->bigIncrements('id_country');
            /**
             * [$table->string] Here we declare the column country_name type String
             */
            $table->string('country_name',50);
            /**
             * [$table->string] Here we declare the column country_code type String
             * This field we're gonna use it for saving country_code that is in the ISO
             */
            $table->string('country_code',2)->unique();
            /**
             * [$table->string] Here we declare the column cordinates type String
             * this field we're gonna use it for saving the cordinate that the api google gave us
             */
            $table->string('cordinates',15);
            /**
             * [$table->tinyInteger] Here we declare the column status type String
             * This field we're gonna use it  for saving the status of each country
             * if it's 1 the country is active, else if it's 0 is inactive
             */
            $table->tinyInteger('status')->default(1);
            /**
             * [$table->timestamps] Here we declare the columns create_at and update_at type TIMESTAMP
             * This field we're gonna use it for saving when a country is create it or update it
             */
            $table->timestamps();
            /**
             * [$table->softDeletes] Here we declare the column deleted_at type TIMESTAMP
             * This field we're gonna use it for save when a country has been changed the field status
             */
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations. Delete the countries table if exists when a rollback or migration is used
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
