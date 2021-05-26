<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
</head>
<body>
        <div class="container">
          <div class="row mt-5">
           <div class="col-md-8 offset-md-2">
             <div class="card">
                <div class="card-header" style="background-color: #ADEFD1FF;">
                    <h4 class="text-center">Create Teacher</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('add-teacher') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Teacher Name</label>
                            <input type="text" class="form-control" name="name" id="">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" name="phone_number" id="">
                        </div>

                        <div class="form-group">

                            <select name="dep_id" id="dept" class="form-control">
                                <option>Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}" >{{ $department->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">

                            <select name="course_id" id="course" class="form-control">
                                <option>Select Course</option>
                            </select>

                        </div>

                        <div class="form-group">

                            <select name="session_id" class="form-control">
                                <option>Select Session</option>
                                @foreach($sessions as $session)
                                <option value="{{ $session->id }}" >{{ $session->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <select name="section_id" id="batch" class="form-control">
                                <option value="">Select Batch</option>
                                @foreach ($sections as $row)
                                    <option value="{{ $row->id }}">{{ $row->batch }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">

                            <select name="section" id="section" class="form-control">
                                <option>Select Section</option>

                                {{-- @foreach($sections as $section)
                                    @php
                                        $sec = $section->title;
                                        $sec_name = explode(',',$sec);

                                    @endphp

                                    @foreach ($sec_name as $row)
                                        <option value="{{ $section->id }}" >{{ $row }}</option>
                                    @endforeach

                                @endforeach --}}

                            </select>

                        </div>


                        <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <a class="btn btn-secondary" href="{{URL::to('all-courses')}}">Back</a>
                        </div>
                    </form>
             </div>
            </div>
         </div>
        </div>
        </div>

        <script>
            $(document).ready(function(){
                $("#dept").change(function(){
                    var dept_id = $("#dept").val();
                    $.ajax({
                        url: "api/get-course/"+dept_id,
                        dataType: 'json',
                        success: function(data){
                            console.log(data.courses)
                            $("#course").html('<option value="">Choose Course</option>');
                            var len_dis = data.courses.length ;
                            for(i=0; i < len_dis ; i++){
                                var str = '<option value="'+data.courses[i].id+'">'+data.courses[i].name+'</option>' ;
                                $("#course").append(str);
                            }
                        }
                    });
                });


                $("#batch").change(function(){
                    var batch_id = $("#batch").val();
                    $.ajax({
                        url: "api/get-section/"+batch_id,
                        dataType: 'json',
                        success: function(data){
                            console.log(data.sections)
                            // var sec_name = document.getElementById("section").innerHTML = data.sections.title

                            $("#section").html('<option value="">Choose Section</option>');
                            var len_dis = (data.sections.title.length) ;
                            var len_sec = len_dis.toFixed() ;
                            console.log(len_sec)
                            for(i=0; i < len_dis ; i+=2){
                                var str = '<option value="'+data.sections.title[i]+'">'+data.sections.title[i]+'</option>' ;
                                $("#section").append(str);
                            }
                        }
                    });
                });
            });
        </script>
</body>
</html>
