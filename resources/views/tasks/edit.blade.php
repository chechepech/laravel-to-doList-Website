@extends('layouts.app')
@section('title','Edit task | TODO-List')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
	<form class="form-horizontal bg-white py-3 px-4 shadow rounded" action="{{route('tasks.update',$todo)}}" method="post" accept-charset="utf-8">
		<p class="h2 text-center">EDIT TASK</p>
		<hr>
		@csrf @method('PATCH')
		<div class="form-group">
			<label for="task">Task:</label>
			<input id="task" type="text" class="form-control" name="task" value="{{old('task',$todo->task)}}" placeholder="Enter a task name" required autofocus>
		</div>
		<div class="form-group">
		<label><input type="checkbox" name="status" {{$todo->status ? "checked" : ""}}>&ensp;Close this task?</label><small class="text-muted float-right">Created at:&ensp;{{$todo->created_at->diffForHumans()}}</small>
		</div>
		<input type="submit" class="btn btn-primary btn-sm" name="save" value="Save">
		<a class="btn btn-secondary btn-sm float-right" href="{{route('tasks.index')}}">Back</a>
	</form>
		</div>
	</div>
</div>
@endsection