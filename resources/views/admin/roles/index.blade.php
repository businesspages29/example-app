@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Role Management</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      @can('role-create')
      <a class="btn btn-sm btn-outline-success" href="{{ route('admin.roles.create') }}">Create New Role</a>
      @endcan
    </div>
  </div>
</div>
<x-admin.flash-message/>
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                <form action="{{route('admin.roles.destroy',$role->id)}}" method="post" style="display:inline">
                @csrf 
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>
{!! $roles->render() !!}
@endsection