
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    
<div class="container">
       
        
    <div class="row pt-2">
    <div class="col-1"></div>
    <div class="col-10">
    @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
    <a href="{{route('company.create')}}" type="button"  class="btn btn-primary mr-5" style="float:right">Add</a>
    <h4>Company Table</h4>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
    <div class="col-1"></div>
    </div>
   
</div>
   
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        //  processing: true,
        serverSide: true,
        ajax: "{{ route('company.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'logo', name: 'logo',render: function( data, type, full, meta ) {
                return "<img src=\"/storage/images/" + data + "\" height=\"50\"   alt='No Image'/>";
            }},
            {data: 'website', name: 'website'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });

  
  $('body').on('click', '.delete', function (event) {  
        event.preventDefault();
    var url = $(this).attr('href'); 
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonColor: '#998cf5',
        buttonsStyling: false
     },
     function(isConfirm) { 
         if(isConfirm)
         {
            window.location.href = url;
         }
      
        });
       
        
    });     
    
</script>
</html>
@endsection