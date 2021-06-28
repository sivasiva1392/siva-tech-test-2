<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tech-Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">



    <div class="col-md-12">

    @if ($errors->any())
   <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      <ul style="list-style-type: none;">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
    @endif



    {{ Form::open(['action' => 'TechController@store']) }}
    {{Form::token()}}

    <div class="form-group">
        {{Form::label('tech_name', 'Tech Name')}}
        {{Form::text('tech_name', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('description', 'Descriotion')}}
        {{Form::text('description', '', ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Create!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
    <a href="{{url('/')}}/tech" class="btn btn-danger">Cancel</a>
    </div>

  </div>   
</div>
</body>
</html>
