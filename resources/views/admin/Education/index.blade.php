@extends('layouts.app') @section('content')
<div class="content">
    <div class="container-fluied">
        <div class="row mt-3">
            <div class="card col-lg-12">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">EducationList</h3>
                        <a href="{{ route('edu.create') }}" class="btn btn-primary">Education Add </a>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-body p-0">
                        @if($education->count()>0)
                        <table class="table table-bordered table-hover table-striped">
                            <tr class="bg-success">
                                <th class="text-white text-center font-weight-bold">Id</th>
                                <th class="text-white text-center font-weight-bold">Exam</th>
                                <th class="text-white text-center font-weight-bold">Institute</th>
                                <th class="text-white text-center font-weight-bold">Year</th>
                                <th class="text-white text-center font-weight-bold" colspan="2">Action</th>
                            </tr>
                            @foreach($education as $edu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $edu->exam }}</td>
                                <td>{{ $edu->institute }}</td>
                                <td>{{ $edu->year }}</td>
                                <td>
                                    <a href="{{ route('edu.edit',['id'=>$edu->id ]) }}" class="btn btn-primary btn-sm" id="fa"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('edu.delete',['id'=>$edu->id ]) }}" class="btn btn-danger btn-sm" id="fa_a" data-toggle="modal" data-target="#modal-primary1{{$edu->id}}"><i class="fas fa-minus"></i></a>
                                    <!-- start modal -->
                                    <div class="modal fade" id="modal-primary1{{$edu->id}}">

                                        <div class="modal-dialog">
                                            <div class="modal-content bg-primary">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">post</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <p>Are you sure education backgorund parmanently trashed?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between bg-light">
                                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                    <a type="button" href="{{ route('edu.delete',['id'=>$edu->id ]) }}" class="btn btn-primary">
                                                        <i style="margin-right: 5px; color: white;" class="fas fa-trash"></i><span class="text-light">OK</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </td>
                            </tr>

                            @endforeach
                        </table>

                        @else
                        <h3 class="text-center text-danger p-5">There Are No Data Yet.</h3>
                        @endif
                        <div class="mt-2 p-2">
                            {!! $education->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
