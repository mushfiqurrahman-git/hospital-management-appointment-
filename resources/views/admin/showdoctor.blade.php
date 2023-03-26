<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div align="center" style="padding:150px">
    <h1>ALL Doctors </h1>
    <table class="table table-striped">
  <thead>
    <tr style="background-color:black color:white">
      <th scope="col">Doctor Name</th>
      <th scope="col">Phone </th>
      <th scope="col">Speciality</th>
      <th scope="col">Room No</th>
      <th scope="col">Image</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data as $doctor)
    <tr>
      <td>{{$doctor->name}}</td>
      <td>{{$doctor->phone}}</td>
      <td>{{$doctor->speciality}}</td>
      <td>{{$doctor->room}}</td>
      <td><img height="100px" width="100px" src="doctorimage/{{$doctor->image}}"></td>
      <td><a class="btn btn-danger" href="
      {{url('deletedoctor',$doctor->id)}}">Delete</td>
      <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</td>

    </tr>
    @endforeach

  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>