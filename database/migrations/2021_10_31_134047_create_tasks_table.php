<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{
		Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->string( 'title', 512 );
			$table->string( 'description', 1024 )->nullable();
			$table->smallInteger( 'status' );
			$table->smallInteger( 'hoursRequired' )->default( 0 );
			$table->smallInteger( 'hoursConsumed' )->default( 0 );
			$table->dateTime( 'createdAt' );
			$table->dateTime( 'updatedAt' )->nullable();
			$table->date( 'plannedStartDate' )->nullable();
			$table->date( 'plannedEndDate' )->nullable();
			$table->date( 'actualStartDate' )->nullable();
			$table->date( 'actualEndDate' )->nullable();
			$table->text( 'content' )->nullable();
			$table->foreignId( 'userId' )->nullable()->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
			$table->foreignId( 'createdBy' )->nullable()->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'set null' );
			$table->foreignId( 'updatedBy' )->nullable()->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'set null' );
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
