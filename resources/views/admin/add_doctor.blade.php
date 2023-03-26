<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style type="text/css">
            label
            {
                display: inline-block;

                width:200px;
            }
            </style>
</head>
<body>




        <div class="container-fluid page-body-wrapper">

        <div class="container" style="padding-top:200px" align="center">
@if(session()->has('message'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
        x
    </button>
        {{session()->get('message')}}
    </div>
@endif
    <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="padding:15px">
        <label>Doctor Name</label>
        <input required type="text" style="color:black" name="name" placeholder="Name"></input>
        </div>
        <div style="padding:15px">
        <label>Phone</label>
        <input required type="text" style="color:black" name="number" placeholder="Number"></input>
        </div>
        <div style="padding:15px">
        <label>Speciality</label>
        <select required name="speciality" style="color:black" width="200px">
            <option>--Select--</option>
            <option value="skin">Skin</option>
            <option value="heart">Eye</option>
            <option value="heart">Heart</option>
        </select>
        </div>
        <div style="padding:15px">
        <label>Room No</label>
        <input required type="text" style="color:black" name="room" placeholder="Room Number"></input>
        </div>
        <div style="padding:15px">
        <label>Doctor Image</label>
        <input required type="file" style="color:black" name="file" placeholder="Number"></input>
        </div>
        <div style="padding:15px">
        <input required type="submit" class="btn btn-success">
        </div>
        </form>
        </div>
        </div>
    </body>
</html>