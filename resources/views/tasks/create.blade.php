@extends('layouts.app')
@section('title','New task | TODO-List')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
	<form class="bg-white py-3 px-4 shadow rounded"action="{{route('tasks.store')}}" method="post" accept-charset="utf-8">
		<p class="h2 text-center">NEW TASK</p>
		<hr>
		@csrf
		<div class="form-group">
			<label for="task">TASK:</label>
			<input id="task" type="text" class="form-control" name="task" value="{{old('task')}}" placeholder="Enter a task name" required autofocus>
		</div>
		<input type="submit" class="btn btn-primary btn-sm" name="save" value="Save">
		<a href="{{route('tasks.index')}}" class="btn btn-secondary btn-sm float-right">Back</a>
	</form>
		</div>
	</div>
</div>
@endsection