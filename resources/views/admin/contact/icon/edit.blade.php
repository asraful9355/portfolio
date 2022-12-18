@extends('layouts.app2')
@section('content')
 <!-- Main content -->
    <div class="content  mt-3">
      <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title"> Social Media Icon Update</h3>
                            <a href="{{ route('media.index') }}" class="btn btn-primary">Go Media Icon List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('media.update',['id'=>$med->id ]) }}" method="post">
                                    @csrf
                                   
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="name">Icon Link</label>                                              
                                            <input type="text" name="icon" class="form-control" id="icon" placeholder="Type Media Icon Here" value="{{ $med->icon }}">
                                        </div>
                                        @error('icon')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <label for="name">Your Media Link</label>                                              
                                            <input type="text" name="url" class="form-control" id="url" placeholder="Type Your Media Link Here" value="{{ $med->url }}">
                                        </div>
                                        @error('url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                      
                                      
                                        <div class="form-group ">
                                          <input type="submit" class="btn btn-outline-success btn-lg" value="Update Now">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
