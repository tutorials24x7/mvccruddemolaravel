@extends( 'layouts.task' )
@section( 'metaTitle', 'Update Task' )
@section( 'metaDescription', 'Update an existing task.' )
@section( 'content' )
	<div class="clearfix pt-4 pb-2">
		<div class="float-left">
			<h2>Update Task</h2>
		</div>
		<div class="float-right">
			<a class="btn btn-primary" href="{{ route( 'tasks.index' ) }}" title="All Tasks">
				<i class="fa fa-arrow-left"></i>
			</a>
		</div>
	</div>
	@if($errors->any())
	<div class="alert alert-danger">
		Resolve the errors to create the task.<br/>
		<ul>
		@foreach( $errors->all() as $error )
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif
	<form action="{{ route( 'tasks.update', $task->id ) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Title *</label>
					<input type="text" name="title" class="form-control" placeholder="Title" value="{{ $task->title }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Status *</label>
					<select name="status" class="form-control">
						<?php
							foreach( $statusMap as $key => $value ) {

								if( $key == $task->status ) {
						?>
							<option value="<?= $key ?>" selected><?= $value ?></option>
						<?php } else { ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php } } ?>
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control" placeholder="Description">{{ $task->description }}</textarea>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Hours Estimated</label>
					<input type="text" name="hoursRequired" class="form-control" placeholder="Hours Estimated" value="{{ $task->hoursRequired }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Hours Consumed</label>
					<input type="text" name="hoursConsumed" class="form-control" placeholder="Hours Consumed" value="{{ $task->hoursConsumed }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Planned Start Date</label>
					<input type="text" name="plannedStartDate" class="form-control datepicker" placeholder="Planned Start Date" data-date-format="yyyy-mm-dd" value="{{ $task->plannedStartDate }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Planned End Date</label>
					<input type="text" name="plannedEndDate" class="form-control datepicker" placeholder="Planned End Date" data-date-format="yyyy-mm-dd" value="{{ $task->plannedEndDate }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Actual Start Date</label>
					<input type="text" name="actualStartDate" class="form-control datepicker" placeholder="Actual Start Date" data-date-format="yyyy-mm-dd" value="{{ $task->actualStartDate }}">
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<label>Actual End Date</label>
					<input type="text" name="actualEndDate" class="form-control datepicker" placeholder="Actual End Date" data-date-format="yyyy-mm-dd" value="{{ $task->actualEndDate }}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<div class="form-group">
						<label>Notes</label>
						<textarea name="content" class="form-control" placeholder="Notes">{{ $task->content }}</textarea>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center p-3">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>
@endsection