<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$tasks = Task::latest()->paginate( 10 );

		$statusMap = Task::$statusMap;

		return view( 'tasks.index', compact( 'tasks', 'statusMap' ) )
			->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 10 );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$statusMap = Task::$statusMap;

		return view( 'tasks.create', compact( 'statusMap' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {

		$request->validate([
			'title' => 'required',
			'status' => 'required|numeric|min:0|not_in:0',
			'hoursRequired' => 'numeric|nullable|min:0|not_in:0',
			'hoursConsumed' => 'numeric|nullable|min:0|not_in:0',
			'plannedStartDate' => 'nullable|date_format:Y-m-d',
			'plannedEndDate' => 'nullable|date_format:Y-m-d',
			'actualStartDate' => 'nullable|date_format:Y-m-d',
			'actualEndDate' => 'nullable|date_format:Y-m-d'
		]);

		Task::create( $request->all() );

		return redirect()->route( 'tasks.index' )
			->with( 'success', 'Task created successfully.' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Task  $task
	 * @return \Illuminate\Http\Response
	 */
	public function show( Task $task ) {

		return view( 'tasks.show', compact( 'task' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Task  $task
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Task $task ) {

		$statusMap = Task::$statusMap;

		return view( 'tasks.edit', compact( 'task', 'statusMap' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Task  $task
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Task $task ) {

		$request->validate([
			'title' => 'required',
			'status' => 'required|numeric|min:0|not_in:0',
			'hoursRequired' => 'numeric|nullable|min:0|not_in:0',
			'hoursConsumed' => 'numeric|nullable|min:0|not_in:0',
			'plannedStartDate' => 'nullable|date_format:Y-m-d',
			'plannedEndDate' => 'nullable|date_format:Y-m-d',
			'actualStartDate' => 'nullable|date_format:Y-m-d',
			'actualEndDate' => 'nullable|date_format:Y-m-d'
		]);

		$task->update( $request->all() );

		return redirect()->route( 'tasks.index' )
			->with( 'success', 'Task updated successfully.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Task  $task
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Task $task ) {

		$task->delete();

		return redirect()->route( 'tasks.index' )
			->with( 'success', 'Task deleted successfully.' );
	}
}
