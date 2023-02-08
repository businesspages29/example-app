@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New User</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <a class="btn btn-sm btn-outline-danger" href="{{ url()->previous() }}">Back</a>
    </div>
  </div>
</div>
<x-admin.flash-message/>
<form action="{{ route('admin.users.store') }}" method="POST">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" type="text" name="name" placeholder="Name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Email:</strong>
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Password:</strong>
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            <input class="form-control" type="password" name="confirm-password" placeholder="Confirm Password">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <div class="form-group">
            <strong>Role:</strong>
            <select class="form-control" name="roles[]" id="" multiple>
            @foreach ($roles as $key => $role)
                <option value="{{ $role }}">{{ $role }}</option>
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