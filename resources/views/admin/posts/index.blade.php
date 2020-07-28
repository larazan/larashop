@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Posts</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                    <tr>    
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td><img src="{{ asset('storage/'. $article->small) }}" /></td>
                                       
                                        <td>{{ $article->status }}</td>
                                        <td>
                                            @can('edit_posts')
                                                <a href="{{ url('admin/posts/'. $article->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            @endcan

                                            @can('delete_posts')
                                                {!! Form::open(['url' => 'admin/posts/'. $article->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>

                    @can('add_posts')
                        <div class="card-footer text-right">
                            <a href="{{ url('admin/posts/create') }}" class="btn btn-primary">Add New</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection