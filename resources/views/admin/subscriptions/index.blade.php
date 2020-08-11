@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Email Subscriptions</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Email</th>
                                
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($subscriptions as $subscribe)
                                    <tr>    
                                        <td>{{ $subscribe->id }}</td>
                                        <td>{{ $subscribe->email }}</td>
                                       
                                        <td>{{ $subscribe->status }}</td>
                                        <td>{{ $subscribe->created_at }}</td>
                                        <td>
                                            @can('edit_subscriptions')
                                                <a href="{{ url('admin/subscriptions/'. $subscribe->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            @endcan

                                            @can('delete_subscriptions')
                                                {!! Form::open(['url' => 'admin/subscriptions/'. $subscribe->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        <div class="pagination-style">
                        {{ $subscriptions->links() }}
                        </div>
                        
                    </div>

                    @can('add_subscriptions')
                        <div class="card-footer text-right">
                            <a href="{{ url('admin/subscriptions/create') }}" class="btn btn-primary">Add New</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection