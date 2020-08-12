@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Information</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Type</th>
                                <!-- <th>Description</th> -->
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @php
                                $i = 1
                                @endphp
                                @forelse ($infos as $info)
                                    <tr>    
                                        <td>{{ $i++ }}</td>
                                        <td>{{ ucwords($info->type) }}</td>  
                                        <!-- <td>{{ substr(strip_tags($info->body), 0, 200) }}...</td>                                      -->
                                        <td>
                                            @can('edit_infos')
                                                <a href="{{ url('admin/infos/'. $info->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                                            @endcan

                                            @can('delete_infos')
                                                {!! Form::open(['url' => 'admin/infos/'. $info->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $infos->links() }}
                        </div>
                    </div>

                    @can('add_infos')
                        <div class="card-footer text-right">
                            <a href="{{ url('admin/infos/create') }}" class="btn btn-primary">Add New</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection