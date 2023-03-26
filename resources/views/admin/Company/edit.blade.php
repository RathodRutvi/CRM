
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<style>
  .error{
    color:red;
  }
</style>
</head>
<body>
<div class="row pt-5">
    <div class="col-2"></div>
    <div class="col-8">
    <a href="{{route('company.index')}}" type="button"  class="btn btn-primary" style="float:right">Back</a>
    <h4>Edit Company</h4>
    <form method="POST" action="{{route('company.update',$company->id)}}" enctype="multipart/form-data" id="form1">
        @csrf
        @method("PUT")
    <div class="form-group pt-4">
        <label for="">Name</label>
        <input type="text" name="name"  class="form-control" id="" value="{{$company->name}}" placeholder="Enter Name">
        @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
      </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" value="{{$company->email}}"  aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="">Logo</label><br>
    <input type="file" name="logo" class="form-control"  id="" value="{{$company->logo}}"  placeholder="Enter Logo">
   
    <img src="{{url('storage/images/'.$company->logo)}}" width="100px;" height="100px;"/>
    @if ($errors->has('logo'))
    <span class="text-danger">{{ $errors->first('logo') }}</span>
    @endif
</div>
  <div class="form-group">
    <label for="">Website</label><br>
    <input  type="text" name="website" class="form-control" value="{{$company->website}}"  placeholder="Enter website">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
    <div class="col-2"></div>
</div>
</body>
</html>
@endsection
