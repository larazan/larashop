@extends('themes.ezone.layout')

@section('content')

<div class="container ptb-20">
	<div class="breadcrumb-content" style="color: #000;">
		<ul>
			@foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
			<li><a href="{{ $key }}">{{ $value }}</a></li>
			@endforeach
			<li>{{ $breadcrumbs_data['current_page_title'] }}</li>
		</ul>
	</div>
</div>

<div class="blog-details pt-25 pb-100">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8">
                <div class="blog-details-info">
                    <div class="blog-meta">
                        <ul>
                            <li>Admin</li>
                            <li>{{ date('M j, Y', strtotime($post->created_at)) }}</li>
                        </ul>
                    </div>
                    <h3>{{ $post->title }}</h3>
                    <img src="./Ezone - eCommerce HTML5 Template blog detail_files/13.jpg" alt="">
                    <p>{{ $post->body }}</p>
                </div>
                
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>

@endsection