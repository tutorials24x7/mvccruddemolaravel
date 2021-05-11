<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends \Illuminate\Database\Migrations\Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create( 'tasks', function( Blueprint $table ) {
			$table->id();
			$table->string( 'title', 512 )->nullable( false );
			$table->string( 'description', 1024 )->nullable();
			$table->smallInteger( 'status' )->nullable( false );
			$table->smallInteger( 'hoursRequired' )->nullable();
			$table->smallInteger( 'hoursConsumed' )->nullable();
			$table->dateTime( 'createdAt' )->nullable( false );
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
    public function down() {

        Schema::dropIfExists( 'tasks' );
    }
}
