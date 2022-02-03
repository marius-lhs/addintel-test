<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    private string $tableName = 'luigis_orders';

	public function up()
	{
		Schema::create($this->tableName, static function(Blueprint $table) {
			$table->increments('id');
            $table->string('status', 255);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop($this->tableName);
	}
}
