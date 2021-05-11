@extends( 'layouts.task' )
@section( 'metaTitle', 'All Tasks' )
@section( 'metaDescription', 'Shows the list of all the tasks.' )
@section( 'content' )
	<div class="clearfix pt-4 pb-2">
		<div class="float-left">
			<h2>Manage Tasks</h2>
		</div>
		<div class="float-right">
			<a class="btn btn-success" href="{{ route( 'tasks.create' ) }}" title="Create Task">
				<i class="fas fa-plus"></i>
			</a>
		</div>
	</div>
	@if( $message = Session::get( 'success' ) )
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div class="container">
		<div class="row text-2xl">
			<div class="col p-2 border border-right-0"><h5>Title</h5></div>
			<div class="col-6 p-2 border border-right-0"><h5>Description</h5></div>
			<div class="col p-2 border border-right-0"><h5>Status</h5></div>
			<div class="col p-2 border"><h5>Actions</h5></div>
		</div>
		@foreach( $tasks as $task )
			<div class="row row-task-main">
				<div class="col p-2 border border-right-0">{{ $task->title }}</div>
				<div class="col-6 p-2 border border-right-0">{{ $task->description }}</div>
				<div class="col p-2 border border-right-0">{{ $task->getStatusStr() }}</div>
				<div class="col p-2 border">
					<form action="{{ route( 'tasks.destroy', $task->id ) }}" method="POST">
						<span class="trigger-info cursor-pointer" title="Info">
							<i class="fas fa-info text-success fa-lg"></i>
						</span>
						<a href="{{ route( 'tasks.show', $task->id ) }}" title="View">
							<i class="fas fa-eye text-success fa-lg"></i>
						</a>
						<a href="{{ route( 'tasks.edit', $task->id) }}">
							<i class="fas fa-edit fa-lg"></i>
						</a>
						@csrf
						@method( 'DELETE' )
						<button type="submit" title="Delete" style="border: none; background-color:transparent;">
							<i class="fas fa-trash fa-lg text-danger"></i>
						</button>
					</form>
				</div>
			</div>
			<div class="row row-task-info border border-top-0 p-3">
				<div class="row">
					<div class="col-md-6">
						<span class="font-weight-bold">Hours Estimated:</span> {{ $task->hoursRequired }}<br/>
						<span class="font-weight-bold">Hours Consumed:</span> {{ $task->hoursConsumed }}
					</div>
					<div class="col-md-6">
						<span class="font-weight-bold">Planned Start Date:</span> {{ $task->plannedStartDate }}<br/>
						<span class="font-weight-bold">Planned End Date:</span> {{ $task->plannedEndDate }}
					</div>
					<div class="col-md-6">
						<span class="font-weight-bold">Actual Start Date:</span> {{ $task->actualStartDate }}<br/>
						<span class="font-weight-bold">Actual End Date:</span> {{ $task->actualEndDate }}
					</div>
				</div>
			</div>
		@endforeach
	</div>
    {!! $tasks->links() !!}
@endsection
