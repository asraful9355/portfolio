@extends('layouts.app')
@section('content')
 <!-- Main content -->
    <div class="content  mt-3">
      <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Copy & Right Update </h3>
                            <a href="{{ route('copy.index') }}" class="btn btn-primary">Go Copy & right List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('copy.update',['id'=>$copy->id] ) }}" method="post">
                                    @csrf
                                   
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="name">name </label>                                              
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Type  Name Here" value="{{ $copy->name }}">
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="name">Your Media Link</label>                                              
                                            <input type="text" name="link" class="form-control" id="link" placeholder="Type Your Media Link Here" value="{{ $copy->link }}">
                                        </div>
                                        @error('link')
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
