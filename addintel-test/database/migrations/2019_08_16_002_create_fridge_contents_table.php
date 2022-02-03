<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFridgeContentsTable extends Migration
{
    private string $tableName = 'luigis_fridge_contents';

	public function up()
	{
		Schema::create($this->tableName, static function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('ingredient_id');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('luigis_ingredients')
                ->onDelete('cascade');
            $table->integer('amount')->unsigned();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
