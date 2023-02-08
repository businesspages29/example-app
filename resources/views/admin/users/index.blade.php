@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Users Management</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a class="btn btn-sm btn-outline-success" href="{{ route('admin.users.create') }}"> Create New User</a>
    </div>
  </div>
</div>
<x-admin.flash-message/>
<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
       <form action="{{route('admin.users.destroy',$user->id)}}" method="post" style="display:inline">
       @csrf 
       @method('DELETE')
       <input class="btn btn-danger" type="submit" value="Delete">
       </form>
       {{--
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        --}}
    </td>
  </tr>
 @endforeach
</table>
{!! $data->render() !!}
@endsection