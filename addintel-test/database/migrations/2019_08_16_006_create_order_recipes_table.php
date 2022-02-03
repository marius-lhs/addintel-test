<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRecipesTable extends Migration
{
    private string $tableName = 'luigis_order_recipes';

	public function up()
	{
		Schema::create($this->tableName, function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('recipe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
