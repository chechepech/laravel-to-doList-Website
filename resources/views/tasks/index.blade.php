@extends('layouts.app')
@section('title','Tasks')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<h1 class="text-center">To-Do LIST</h1>
<a class="btn btn-primary btn-sm float-right" href="{{route('tasks.create')}}">New task</a>
	<table class="table table-hover">
		<caption>List of tasks</caption>
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Task</th>
				<th colspan="3" class="text-center">Action</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@forelse($todos as $todo)
				@if($todo->status)
				<tr>
					<td>{{$todo->id}}</td>
					<td><a class="btn btn-link btn-sm" href="{{route('tasks.show',$todo)}}">{{$todo->task}}</a></td>
					<td><a class="btn btn-primary btn-sm float-right" href="{{route('tasks.edit',$todo)}}">Edit</a></td>
					<td><form method="post" action="{{route('tasks.destroy',$todo)}}">
					@csrf @method('DELETE')	<input class="btn btn-secondary btn-sm" type="submit" value="Delete">
				  </form></td>
				  <td></td>
				  <td><small class="text-muted float-right">{{$todo->status ? ' Closed':' Pending'}}</small></td>
				</tr>
				@else
				<tr>
					<td>{{$todo->id}}</td>
					<td><a class="btn btn-link btn-sm" href="{{route('tasks.show',$todo)}}">{{$todo->task}}</a></td>
					<td><a class="btn btn-primary btn-sm float-right" href="{{route('tasks.edit',$todo)}}">Edit</a></td>
					<td><form method="post" action="{{route('tasks.destroy',$todo)}}">
					@csrf @method('DELETE')	<input class="btn btn-secondary btn-sm" type="submit" value="Delete">
				  </form></td>
				  <td><a class="btn btn-dark btn-sm float-left" href="{{route('tasks.done',$todo->id)}}">Ok</a></td>
				  <td><small class="text-muted float-right">{{$todo->status ? ' Closed':' Pending'}}</small></td>
				</tr>
				@endif
			@empty
			<tr><th colspan="4"><p class="h1 text-center">No tasks!</p></th></tr>
			@endforelse
		</tbody>
	</table>
	{{$todos->links()}}
</div>
</div>
</div>
@endsection