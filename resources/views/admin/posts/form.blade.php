@extends('admin.layout')

@section('content')
	
@php
	$formTitle = !empty($post) ? 'Update' : 'New'    
@endphp

<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
						<h2>{{ $formTitle }} Post</h2>
				</div>
				<div class="card-body">
					@include('admin.partials.flash', ['$errors' => $errors])
					@if (!empty($post))
						{!! Form::model($post, ['url' => ['admin/posts', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
						{!! Form::hidden('id') !!}
					@else
						{!! Form::open(['url' => 'admin/posts', 'enctype' => 'multipart/form-data']) !!}
					@endif
						<div class="form-group">
							{!! Form::label('title', 'Title') !!}
							{!! Form::text('title', null, ['class' => 'form-control']) !!}
						</div>
						
					@if (empty($post))
						<div class="form-group">
							{!! Form::label('image', 'Post Image (1920x643 pixel)') !!}
							{!! Form::file('image', ['class' => 'form-control-file', 'placeholder' => 'product image']) !!}
						</div>
					@endif
						<div class="form-group">
							{!! Form::label('body', 'Body') !!}
							{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
						</div>
						<div class="form-group">
							{!! Form::label('status', 'Status') !!}
							{!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
						</div>
						<div class="form-footer pt-5 border-top">
							<button type="submit" class="btn btn-primary btn-default">Save</button>
							<a href="{{ url('admin/posts') }}" class="btn btn-secondary btn-default">Back</a>
						</div>
					{!! Form::close() !!}
				</div>
			</div>  
		</div>
	</div>
</div>
@endsection