@extends('layouts.app')
@section('content')
 <div class="content">
    <div class="container-fluied">
      <div class="row mt-3">
        <div class="card col-lg-12">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">About Me List</h3>
                <a href="{{ route('create.tag') }}" class="btn btn-primary">Create About Me</a>
            </div>
          </div>
        </div>
          <div class="col-12 offset-lg-2 col-md-8 offset-md-2">
              <div class="card">
                  <div class="card-body p-0">
                    @if($tags->count()>0)
                      <table class="table table-bordered table-hover table-striped">
                          <tr class="bg-success">
                            <th class="text-white text-center font-weight-bold">Id</th>
                            <th class="text-white text-center font-weight-bold">My Self</th>
                            <th class="text-white text-center font-weight-bold">featured</th>
                            <th class="text-white text-center font-weight-bold">Button Title </th>
                            <th class="text-white text-center font-weight-bold">Buttton Url</th>
                            <th class="text-white text-center font-weight-bold">Created_At</th>
                            <th class="text-white text-center font-weight-bold" colspan="2">Action</th>
                          </tr>
                          @foreach($tags as $tag)
                          <tr>
                            
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ Str::limit ( $tag->myself,10) }}</td>
                              <td><img src="{{ $tag->featured }}" alt="" style=" width:90px; height:70px;"></td>
                              <td>{{ $tag->btn_title }}</td>
                              <td>{{ Str::limit ( $tag->btn_url,10) }}</td>
                              <td>{{ $tag->created_at->diffForhumans()}}</td>
                              <td>
                                <a href="{{route('edit.tag',['id' => $tag->id])}}" class="btn btn-primary btn-sm" id="fa"><i class="fas fa-edit"></i></a>

                                <a href="{{route('destroy.tag',['id' => $tag->id])}}" class="btn btn-danger btn-sm" id="fa_a" data-toggle="modal" data-target="#modal-primary1{{$tag->id}}"><i class="fas  fa-trash"></i></a>
                                <!-- start modal -->
                                <div class="modal fade" id="modal-primary1{{$tag->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                      <div class="modal-header">
                                        <h4 class="modal-title">tag</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body bg-light">
                                        <p>Are you sure information parmanently deleted?</p>
                                      </div>
                                      <div class="modal-footer justify-content-between bg-light">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <a type="button" href="{{route('destroy.tag',['id' => $tag->id])}}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
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
                 {!! $tags->links() !!}
                 </div>                 
              </div>
          </div>
      </div>
    </div>
  </div>
  </div>
   
@endsection