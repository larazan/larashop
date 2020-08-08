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

<div class="blog-details pt-25 pb-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="blog-details-info">

                    {!!html_entity_decode($info->body)!!}
                </div>

            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <div class="shop-sidebar">
                    @if ($informations)
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">Info</h3>
                        <div class="sidebar-categories">
                            <ul>
                                @foreach ($informations as $information)
                                    <li><a href="{{ url('info/'. $information->slug) }}">{{ ucwords($information->type) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>


@endsection