
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
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

<div class="row pt-2">
    <div class="col-2"></div>
    <div class="col-8">
    <a href="{{route('company.index')}}" type="button"  class="btn btn-primary" style="float:right">Back</a>
    <h4>Add Company</h4>
    <form method="POST" action="{{route('company.store')}}" enctype="multipart/form-data" id="form1">
        @csrf
    <div class="form-group pt-4">
        <label for="">Name<span style="color:red">*<span></label>
        <input type="text" name="name"  class="form-control" id="" placeholder="Enter Name">
     @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    </div>
   
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="">Logo<span style="color:red">*<span></label><br>
    <input type="file" name="logo" class="form-control"  id="" placeholder="Enter Logo">
    @if ($errors->has('logo'))
    <span class="text-danger">{{ $errors->first('logo') }}</span>
    @endif
  </div>
  
  <div class="form-group">
    <label for="">Website</label><br>
    <input  type="text" name="website" class="form-control" placeholder="Enter website">
  </div>
  <button type="submit" class="btn btn-primary mt-4 ">Submit</button>
</form>
    </div>
    <div class="col-2"></div>
</div>
<!-- </body>
</html> -->
@endsection
