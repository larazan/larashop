@extends('admin.layout')

@section('content')
	

<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
						<h2> Settings</h2>
				</div>
				<div class="card-body">
					@include('admin.partials.flash', ['$errors' => $errors])
						{!! Form::open(['url' => 'admin/settings', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
					
						<div class="form-group">
							{!! Form::label('name', 'System name') !!}
							{!! Form::text('name', $system_name, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('favicon', 'Favicon') !!}
							{!! Form::file('favicon', ['class' => 'form-control-file', 'placeholder' => 'favicon']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('front_logo', 'Front Logo') !!}
							{!! Form::file('front_logo', ['class' => 'form-control-file', 'placeholder' => 'front logo']) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('admin_logo', 'Admin Logo') !!}
							{!! Form::file('admin_logo', ['class' => 'form-control-file', 'placeholder' => 'admin logo']) !!}
						</div>
						
						<div class="form-footer pt-5 border-top">
							<button type="submit" class="btn btn-primary btn-default">Save</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>  
		</div>
	</div>
</div>
@endsection