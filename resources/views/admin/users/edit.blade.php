@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit User</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a class="btn btn-sm btn-outline-danger" href="{{ url()->previous() }}">Back</a>
    </div>
  </div>
</div>
<x-admin.flash-message/>
<form action="{{ route('admin.users.update',$user->id) }}" method="POST">
@csrf
@method('PATCH')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" type="text" name="name" placeholder="Name" value="{{$user->name}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Email:</strong>
            <input class="form-control" type="email" name="email" placeholder="Email" value="{{$user->email}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Role:</strong>
            <select class="form-control" name="roles[]" id="" multiple>
            @foreach ($roles as $key => $role)
                <option value="{{ $role }}"
                @if(in_array($role, $user->getRoleNames()->toArray() ))
                selected
                @endif
                >{{ $role }}</option>
            @endforeach    
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection