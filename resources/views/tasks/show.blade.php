@extends( 'layouts.task' )
@section( 'metaTitle', 'View Task' )
@section( 'metaDescription', 'View task details.' )
@section( 'content' )
	<div class="clearfix pt-4 pb-2">
		<div class="float-left">
			<h2>Task Details ({{ $task->title }})</h2>
		</div>
		<div class="float-right">
			<a class="btn btn-primary" href="{{ route( 'tasks.index' ) }}" title="All Tasks">
				<i class="fa fa-arrow-left"></i>
			</a>
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Title - </strong> {{ $task->title }}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Status - </strong> {{ $task->getStatusStr() }}
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Description - </strong> {{ $task->description }}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Notes - </strong> {{ $task->notes }}
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Hours Estimated - </strong> {{ $task->hoursRequired }}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Hours Consumed - </strong> {{ $task->hoursConsumed }}
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Planned Start Date - </strong> {{ $task->plannedStartDate }}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Planned End Date - </strong> {{ $task->plannedEndDate }}
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Actual Start Date - </strong> {{ $task->actualStartDate }}
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
			<strong>Actual End Date - </strong> {{ $task->actualEndDate }}
		</div>
	</div>
@endsection