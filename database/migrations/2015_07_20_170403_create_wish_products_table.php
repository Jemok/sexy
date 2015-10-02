<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wish_products', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('product_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->integer('quantity');
            $table->timestamp('date_added');
            $table->string('session_id', 50);
            $table->string('ip_address', 50);
            $table->string('image', 50);
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');

           $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wish_products');
	}

}
