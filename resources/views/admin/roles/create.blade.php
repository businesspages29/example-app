@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Role</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a class="btn btn-sm btn-outline-danger" href="{{ url()->previous() }}">Back</a>
    </div>
  </div>
</div>
<x-admin.flash-message/>
<form action="{{route('admin.roles.store')}}" method="post">
@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" type="text" name="name" placeholder="Name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>
                <input class="name" type="checkbox" name="permission[]" id="" value="{{$value->id}}">
                {{ $value->name }}
                </label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection