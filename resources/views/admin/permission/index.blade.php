@extends('layouts.master', ['title' => 'Permissions'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-title">Permissions</h1>

        <x-alert></x-alert>

        <div class="card">
            <div class="card-header">
                <h5 class="text-bold card-title">Permissions List</h5>
            </div>

            <div class="card-body">
                @can('permission-create')
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Add Permission</a>
                @endcan
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Name</th>
                                <th>Key Access</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->key }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @can('permission-edit')
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('permission-delete')
                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post" style="display: inline;" class="delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop