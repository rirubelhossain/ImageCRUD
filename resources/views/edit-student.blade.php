<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add Student</title>
</head>
<body>

    <section style = "padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add New Student
                        </div>
                        <div class="card-body">

                            @if(Session::has('student_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('student_updated')}}
                                </div>
                            @endif

                            <form  method = "POST" action="{{route('st.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value = "{{$student->id}}">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{$student->name}}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="file">Chose Profile Image</label>
                                    <input type="file" name="file" class="form-control" onchange="previewFile(this)" />
                                    <img id = "previewImg" alt="profile Image" src="{{asset('images')}}/{{$student->profileimage}}" style="max-width:130px;margin-top:20px;" />
                                </div>
                                <button type ="submit" class="btn btn-primary" style="margin-top:5px">Update</button>
                                <a href="/" class="btn btn-success" style="margin-top:5px;">Back To Main</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- This section for javascript -->

    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
            if(file){
                var reader = new FileReader() ;
                reader.onload = function(){
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>


</body>
</html>