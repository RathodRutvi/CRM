
@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
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
    <a href="{{route('employee.index')}}" type="button"  class="btn btn-primary" style="float:right">Back</a>
    <h4>Add Employee</h4>
    <form method="POST" action="{{route('employee.store')}}"  id="form1">
        @csrf
    <div class="form-group pt-4">
        <label for="">First Name <span style="color:red">*</span></label>
        <input type="text" name="firstname"  class="form-control" id="" placeholder="Enter First Name">
        @if ($errors->has('firstname'))
        <span class="text-danger">{{ $errors->first('firstname') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="">Last Name <span style="color:red">*</span></label>
        <input type="text" name="lastname"  class="form-control" id="" placeholder="Enter Last Name">
        @if ($errors->has('lastname'))
        <span class="text-danger">{{ $errors->first('lastname') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="">Select Company</label>
        <select class="custom-select" name="company_id">
        <option value="" selected>Select Company</option>
        @foreach($companies as $company)
        <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
        </select>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
  </div>
  <div class="form-group">
        <label for="">Phone </label>
        <input type="number" name="phone"  class="form-control" id="" placeholder="Enter Phone">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <div class="col-2"></div>
</div>
</body>
</html>
@endsection
