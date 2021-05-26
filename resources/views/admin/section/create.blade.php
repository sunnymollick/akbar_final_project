<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
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
                    <h4  class="text-center">Create Section</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('add-section') }}">
                        @csrf
                        <div class="form-group">
                            <label for=""> Batch</label>
                            <input type="text" class="form-control" name="batch" id="">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Section:</label>
                            <input class="form-control" type="text" name="title" id="size" data-role="tagsinput" required >
                          @error('title')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                          </div> --}}

                        <div class="form-group">
                            <label for="">Section</label>
                            <br>
                            <input type="text" name="title" id="title" class="form-control" data-role="tagsinput" required >
                        </div>



                        <div class="form-group">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <a class="btn btn-secondary" href="{{URL::to('allsections')}}">Back</a>
                        </div>
                    </form>
             </div>
            </div>
         </div>
        </div>
        </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>



</body>
</html>
