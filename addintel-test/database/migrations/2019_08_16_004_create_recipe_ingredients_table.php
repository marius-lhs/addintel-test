<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientsTable extends Migration
{
    private string $tableName = 'luigis_recipe_ingredients';

	public function up()
	{
		Schema::create($this->tableName, function(Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('recipe_id')->index();
            $table->foreign('recipe_id')
                ->references('id')
                ->on('luigis_recipes')
                ->onDelete('cascade');

            $table->unsignedInteger('ingredient_id')->index();
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('luigis_ingredients')
                ->onDelete('cascade');

			$table->integer('amount')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
