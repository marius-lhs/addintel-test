<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    private string $tableName = 'luigis_ingredients';

	public function up()
	{
		Schema::create($this->tableName, function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
