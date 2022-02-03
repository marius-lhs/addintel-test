<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    private string $tableName = 'luigis_recipes';

	public function up()
	{
		Schema::create($this->tableName, static function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 150);
			$table->float('price');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
