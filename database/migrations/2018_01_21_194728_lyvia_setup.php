<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LyviaSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('Address3',256)->after('remember_token')->default('-');
            $table->string('Address2',256)->after('remember_token')->default('-');
            $table->string('Address1',256)->after('remember_token')->default('-');
            $table->integer('recommendation')->after('remember_token')->default('0');
            $table->string('telegram_chatid',256)->after('remember_token')->default('-');
            $table->string('telegram_username',256)->after('remember_token')->default('-');
            $table->string('mobile',32)->after('remember_token')->default('-');
        });

        Schema::create('Exchange', function (Blueprint $table) {
            $table->bigIncrements('ExchangeID');
            $table->string('Name', 256)->default('-');
            $table->string('ModuleName', 256)->default('-');
            $table->timestamps();
        });

        Schema::create('UserExchange', function (Blueprint $table) {
            $table->bigIncrements('UserExchangeID');
            $table->bigInteger('UserID')->unsigned();
            $table->bigInteger('ExchangeID')->unsigned();
            $table->bigInteger('CreatedBy')->unsigned();
            $table->string('Username', 256)->default('-');
            $table->string('APIKey', 256)->default('-');
            $table->string('APISecret', 256)->default('-');
            $table->string('Passphrase', 256)->default('-');
            $table->timestamps();
        });

        Schema::create('CurrencyType', function (Blueprint $table) {
            $table->bigIncrements('CurrencyTypeID');
            $table->string('Name', 256)->default('-');
            $table->timestamps();
        });

        Schema::create('Currency', function (Blueprint $table) {
            $table->bigIncrements('CurrencyID');
            $table->bigInteger('Type')->unsigned();
            $table->string('Name', 256)->default('-');
            $table->string('Symbol', 16)->default('-');
            $table->timestamps();
        });

        Schema::create('Symbol', function (Blueprint $table) {
            $table->bigIncrements('SymbolID');
            $table->string('Symbol', 128)->default('-');
            $table->string('Description', 128)->default('-');
            $table->timestamps();
        });

        Schema::create('Job', function (Blueprint $table) {
            $table->bigIncrements('JobID');
            $table->bigInteger('UserExchangeID')->unsigned();
            $table->bigInteger('Buying_Username')->unsigned();
            $table->bigInteger('Selling_Username')->unsigned();
            $table->bigInteger('Buying_Currency')->unsigned();
            $table->bigInteger('Selling_Currency')->unsigned();
            $table->bigInteger('Buying_Symbol')->unsigned();
            $table->bigInteger('Selling_Symbol')->unsigned();
            $table->bigInteger('Base_Currency')->unsigned();
            $table->bigInteger('CreatedBy')->unsigned();
            $table->string('Name', 256)->default('-');
            $table->float('Transaction_Block', 20,2)->default(0);
            $table->float('Transaction_Amount', 20,2)->default(0);
            $table->float('Spread_Target', 20,2)->default(0);
            $table->timestamps();
        });

        Schema::create('JobSession', function (Blueprint $table) {
            $table->bigIncrements('JobSessionID');
            $table->bigInteger('JobID')->unsigned();
            $table->float('HighestSpread', 20,2)->default(0);
            $table->float('LowestSpread', 20,2)->default(0);
            $table->float('Spread', 20,2)->default(0);
            $table->float('Total_BTC_Sold', 20,2)->default(0);
            $table->float('Total_Capital_Spent', 20,2)->default(0);
            $table->ipAddress('RunningIP')->default('0.0.0.0');
            $table->string('Status', 16)->default('-');
            $table->timestamp('StartedAt')->default('0000-00-00 00:00:00');
            $table->timestamp('EndAt')->default('0000-00-00 00:00:00');;
            $table->timestamps();
        });

        Schema::create('Transaction', function (Blueprint $table) {
            $table->bigIncrements('TransactionID');
            $table->bigInteger('JobSessionID')->unsigned();
            $table->bigInteger('Buying_Currency')->unsigned();
            $table->bigInteger('Selling_Currency')->unsigned();
            $table->bigInteger('Buying_Symbol')->unsigned();
            $table->bigInteger('Selling_Symbol')->unsigned();
            $table->string('Type', 16)->default('-');
            $table->float('Amount', 20,2)->default(0);
            $table->float('Total_Buy', 20,2)->default(0);
            $table->float('Total_Selling', 20,2)->default(0);
            $table->string('Unique_Pair', 128)->default('-');
            $table->string('Response', 128)->default('-');
            $table->float('IDR_Rate', 20,2)->default(0);
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
        Schema::table('users', function ($table) {
            $table->dropColumn('Address3');
            $table->dropColumn('Address2');
            $table->dropColumn('Address1');
            $table->dropColumn('recommendation');
            $table->dropColumn('telegram_chatid');
            $table->dropColumn('telegram_username');
            $table->dropColumn('mobile');
        });

        Schema::drop('Exchange');
        Schema::drop('UserExchange');
        Schema::drop('CurrencyType');
        Schema::drop('Currency');
        Schema::drop('Symbol');
        Schema::drop('Job');
        Schema::drop('JobSession');
        Schema::drop('Transaction');
    }
}
