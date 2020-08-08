@extends('admin.layout')

@section('content')
	
@php
	$formTitle = !empty($info) ? 'Update' : 'New'    
@endphp

<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
						<h2>{{ $formTitle }} Information</h2>
				</div>
				<div class="card-body">
				@include('admin.partials.flash', ['$errors' => $errors])
					@if (!empty($info))
						{!! Form::model($info, ['url' => ['admin/infos', $info->id], 'method' => 'PUT']) !!}
						{!! Form::hidden('id') !!}
					@else
						{!! Form::open(['url' => 'admin/infos']) !!}
					@endif
						<div class="form-group">
							{!! Form::label('type', 'Type') !!}
							{!! Form::text('type', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('body', 'Body') !!}
							{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 10, 'id' => 'editor']) !!}
						</div>
						
						<div class="form-footer pt-5 border-top">
							<button type="submit" class="btn btn-primary btn-default">Save</button>
							<a href="{{ url('admin/infos') }}" class="btn btn-secondary btn-default">Back</a>
						</div>
					{!! Form::close() !!}
				</div>
			</div>  
		</div>
	</div>
</div>
@endsection