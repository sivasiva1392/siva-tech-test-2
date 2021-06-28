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
      <div class="row">
        

      <div class="col-md-6">
        <a class="btn btn-primary" href="{{url('/')}}">Home</a>
 
      </div>
       <div class="col-md-6">
        <a class="btn btn-primary" href="{{route('tech.create')}}">Create New</a>
      </div>
            </div>
    </div>
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="10%">S.no</th>
            <th width="10%">Tech Name</th>
            <th width="30%">Description</th>
            <th width="50%">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($tech) != 0)
          @php $sno =1; @endphp
          @foreach($tech as $data)
          <tr>
            <td>{{$sno}}</td>
            <td>{{$data->tech_name}}</td>
            <td>{{$data->description}}</td>
            <td> 
              <form action="{{ route('tech.destroy', $data->id) }}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="btn btn-danger m-1">Delete</button>
              </form>
              <a href="{{route('tech.show', $data->id)}}" class="btn btn-info m-1">View</a>
              <a href="{{route('tech.edit', $data->id)}}" class="btn btn-primary m-1">Edit</a>
                      
                      </td>
          </tr>
          @php $sno++; @endphp
          @endforeach
          @else
          <tr class="odd no-record">
          <td valign="top" colspan="3">
          <p class="text-center ">No Data Found :(</p>
          </td>
          </tr>
          @endif 
        </tbody>
      </table>

    </div>

  </div>   
</div>
</body>
</html>
