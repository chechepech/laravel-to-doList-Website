@extends('layouts.app')
@section('title','Task | TODO-List')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">	
			<div class="card bg-white mb-3 shadow rounded">			
				<div class="card-header"><strong>Status</strong>:{{$todo->status ? ' Closed':' Pending'}}</div>					
				<div class="card-body">
					<h5 class="card-title">{{$todo->task}}</h5>
					<p class="card-text">Created at:&ensp;{{$todo->created_at->diffForHumans()}}</p>
				<a href="{{route('tasks.index')}}" class="btn btn-secondary btn-sm">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection