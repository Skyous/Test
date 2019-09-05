<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @path database\migrations\2019_09_03_141358_rates_galilea_table
 * @author Cesar Verduzco Reyna <cesar.skyous@gmail.com> Alias Skyous
 * Class where the ports table is create with the command line migration, field are specified in the method up
 * @version 1.1
 */
class RatesGalileaTable extends Migration
{
    /**
     * Run the migrations. Create rates table, columns or indexes into the database
     *
     * @return void
     */
    public function up()
    {
        /**
         * Schema is a facecade and here we call the method create
         * Here it is specified the table name with the first param and it is type String
         * The second param is a function where it has a param type Blueprint(object)
         */
        Schema::create('rates', function (Blueprint $table) {
            /**
             * [$table->bigIncrements] Here it is declared the column id_rate type big Integer that auto increments
             * Here it is specified the table name with the first param is type String
             * The second param is a function where it has a param type Blueprint(object)
             */
            $table->bigIncrements('id_rate');
            /**
             * [$table->unsignedBigInteger] Here it is declared the columnd countryFrom_id type unsignedBigInteger
             * This field will be refered to the table country, it is a foreign key
             * It saves the id country
             */
            $table->unsignedBigInteger('countryFrom_id');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column portFrom_id type unsignedBigInteger
             * This field will be refered to the table port, it is a foreign key
             * It saves the id port
             * A validation will be that the foreign key country of the table port correspond to the id country of this countryFrom_id fk table
             */
            $table->unsignedBigInteger('portFrom_id');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column portTo_id type unsignedBigInteger
             * This field will be refered to the table port, it is a foreign key
             * It saves the id port
             * A validation will be that the foreign key country of the table port correspond to the id country of this countryFrom_id fk table
             * @var [type]
             */
            $table->unsignedBigInteger('portTo_id');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column countryTo_id type unsignedBigInteger
             * This field will be refered to the table country, it is a foreign key
             * It saves the id country
             */
            $table->unsignedBigInteger('countryTo_id');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column currency_id type unsignedBigInteger
             * This field will be refered to the table country it is a foreign key
             * It saves the coin kind e.g USD or MX
             */
            $table->unsignedBigInteger('currency_id');
            /**
             * [$table->decimal] Here it is declared the column amount type double
             * It saves the total amount, field aux it case the price with the carrier changes the total amount
             */
            $table->double('amount',10,2);
            /**
             * [$table->double] Here it is declared the column priceSt20 type double
             * It saves the total amount price of this kind of cargo by the agent
             */
            $table->double('priceSt20',10,2);
            /**
             * [$table->double] Here it is declared the column priceSt40 type double
             * It saves the total amount price of this kind of cargo by the agent
             */
            $table->double('priceSt40',10,2);
            /**
             * [$table->double] Here it is declared the column priceHq40 type double
             * It saves the total amount price of this kind of cargo by the agent
             */
            $table->double('priceHq40',10,2);
            /**
             * [$table->unsignedBigInteger] Here it is declared the column carrier_id type unsignedBigInteger
             * It is refered to the carrier, it is a foreign key refers to the id carrier of carrier table
             */
            $table->unsignedBigInteger('carrier_id');
            /**
             * [$table->unsignedBigInteger] Here it is declared the column servicesIncluded_id type unsignedBigInteger
             * It is referd to the adcional services that will have the rate, it is a foreign key refers to the id service of services table
             */
            $table->unsignedBigInteger('servicesIncluded_id');
            /**
             * [$table->tinyInteger] Here it is declared the column status type tinyInteger
             * It saves the status of the rate, 1 will be active, 0 will be inactive and 2 will be expired
             */
            $table->tinyInteger('status')->default(1);
            /**
             * [$table->date] Here it is declared the column startDatePricing type Date
             * It saves the date when is avaliable the rate
             */
            $table->date('startDatePricing');
            /**
             * [$table->date] Here it is declared the column endDatePricing type Date
             * It saves the date when will be expired the rate
             */
            $table->date('endDatePricing');
            /**
             * [$table->tinyInteger] Here it is declared the column thcExp type tinyInteger
             * It saves if has the option of thc need meaning
             */
            $table->tinyInteger('thcExp')->default(0)->unsigned();
            /**
             * [$table->tinyInteger] Here it is declared the column tchImp type tinyInteger
             * It saves if has this option (need meaning)
             */
            $table->tinyInteger('tchImp')->default(0)->unsigned();
            /**
             * [$table->timestamps] Here it is declared the columns created_at and updated_at type TIMESTAMP
             * It saves the date when a rate is created or updated
             */
            $table->timestamps();
            /**
             * [$table->softDeletes] Here it is declared the column deleted_at  type TIMESTAMP
             * It saves the date when a rate is expired or inactive
             */
            $table->softDeletes();
            // TT = Transit Time need to check
            //$table->string('transitTime');

            /**
             * [$table->unsignedInteger] Here it is declared the column user_id type unsignedInteger
             * It saves the id of the user that create the rate, is a foreign key
             * It refers to the id of the table users
             */
            $table->unsignedInteger('user_id');

            /**
             * [$table->foreign] Here it is created the relation with the table countries
             * The countryFrom_id references to id_country on table countries
             */
            $table->foreign('countryFrom_id')->references('id_country')->on('countries');
            /**
             * [$table->foreign] Here it is created the relation with the table ports
             * The portFrom_id references to id_port on table ports
             */
            $table->foreign('portFrom_id')->references('id_port')->on('ports');
            /**
             * [$table->foreign] Here it is created the relation with the table ports
             * The portTo_id references to id_port on table ports
             */
            $table->foreign('portTo_id')->references('id_port')->on('ports');
            /**
             * [$table->foreign] Here it is created the relation with the table countries
             * The countryTo_id references to id_country on table countries
             */
            $table->foreign('countryTo_id')->references('id_country')->on('countries');
            /**
             * [$table->foreign] Here it is created the relation with the table carroers
             * The carrierd_id references to id_carrier on table carriers
             */
            $table->foreign('carrier_id')->references('id_carrier')->on('carriers');
            /**
             * [$table->foreign] Here it is created the relation with the table services
             * The servicesIncluded_id references to id_service on table servoces
             */
            $table->foreign('servicesIncluded_id')->references('id_service')->on('services');
            /**
             * [$table->foreign] Here it is created the relation with the table users
             * The users_id references to id_country on table users
             */
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
