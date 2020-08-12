@extends('themes.ezone.layout')

@section('content')

<div class="container ptb-20">
	<div class="breadcrumb-content" style="color: #000;">
		<ul>
        @if ($breadcrumbs_data['current_page_title'] != '')
			@foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
			<li><a href="{{ $key }}">{{ $value }}</a></li>
			@endforeach
			<li>{{ $breadcrumbs_data['current_page_title'] }}</li>
        @else 
            @foreach ($breadcrumbs_data['breadcrumbs_array'] as $key => $value)
                @if ($value == 'Home')
                <li><a href="{{ $key }}">{{ $value }}</a></li>
                @else
                <li>{{ $value }}</li>
                @endif
            @endforeach
        @endif
		</ul>
	</div>
</div>

<div class="blog-area pt-25 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="shop-sidebar">
                    
                    <!-- <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="https://demo.hasthemes.com/ezone-preview/ezone-v1/blog-sidebar.html#">
                                <input placeholder="Search Products..." type="text">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div> -->
                    
                    <div class="sidebar-widget mb-50">
                        <h3 class="sidebar-title">Recent Posts</h3>
                        @include('themes.ezone.blogs.sidebar')
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog-mesonry">
                    <div class="row grid" style="position: relative; height: 2041.09px;">
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 grid-item" style="position: absolute; left: 0%; top: 0px;">
                            <div class="blog-wrapper mb-40">
                                <div class="blog-img">
                                    <a href="{{ url('blog/'. $post->slug) }}"><img src="{{ asset('storage/'.$post->featured_img) }}" alt=""></a>
                                </div>
                                <div class="blog-info-wrapper">
                                    <div class="blog-meta">
                                        <ul>
                                            <li>Admin</li>
                                            <li>{{ date('M j, Y', strtotime($post->created_at)) }}</li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{ url('blog/'. $post->slug) }}">{{ $post->title }}</a></h4>
                                    <p>{{ substr($post->body, 0, 120) }}...</p>
                                    <a class="blog-btn btn-hover" href="{{ url('blog/'. $post->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination-style mt-20 text-center">
                           
                            {{ $posts->links() }}
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection