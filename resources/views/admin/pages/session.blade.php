@extends('admin.layouts.default')
@section('xyz')
<main>
    <div class="container-fluid">    
        <div class="card mb-4">
            @if(Session('inserted'))
                <div class=" alert-warning alert-dismissible fade show" role="alert">
                    <strong>
                        {{ Session('inserted') }}
                    </strong>
                </div>
            @endif
        </div>

        <div class="card mb-4">
            <div class="card-body">
            <a href="{{ URL::to('create-session') }}" style="float:right" type="button" class="btn btn-primary">
             Add Session
            </a>
            </div>
            
        </div>
        
        <div class="card mb-4">
            <div class="card-header" style="background-color: #ADEFD1FF;">
                <i class="fas fa-table mr-1"></i>
                List of all Sessions
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($allsessions as $AC)
                        <tr>
                        <td>{{ $AC->name}}</td>
                        <td>{{ $AC->status}}</td>
                        <td>
                            <a class="btn btn-info" href=" {{ URL:: to ('edit-session/'.$AC->id) }} ">Edit</a>
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{ $AC->id }}">Delete</a>
                                     <!-- Modal -->
                            <div class="modal" id="delete{{ $AC->id }}" align ="center">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h3> Delete <b> {{ $AC->name }} </b> ??? </h3>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <a class="btn btn-success" href=" {{ URL:: to ('delete-session/'.$AC->id) }} ">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/assets/demo/datatables-demo.js') }}"></script>
@stop