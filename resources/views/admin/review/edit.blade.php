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
                            <h3 class="card-title">Update Client Information </h3>
                            <a href="{{ route('client.index') }}" class="btn btn-primary">Go To Client List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('client.update',['id'=>$review->id ]) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                   
                                    <div class="card-body">  
                                    
                                        <div class="form-group">
                                            <label for="name">Name:</label><input type="text" name="name" class="form-control" id="name" placeholder="please name here" value="{{ $review->name }}">
                                        </div>
                                        @error('name')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="proffesion">Proffesion:</label><input type="text" name="proffesion" class="form-control" id="proffesion" placeholder="please proffesion here" value="{{ $review->proffesion }}">
                                        </div>
                                        @error('proffesion')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="featured">Featured Image:</label>
                                             <input type="file" name="featured" class="form-control-file border mt-3 mb-3" id="featured" value="{{ $review->featured }}" />
                                           @error('featured')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                       <div class="form-group mt-3">
                                            <label for="about">About Client:</label><input type="text" name="about" class="form-control" id="about" placeholder="please about here" value="{{ $review->about }}">
                                        </div>
                                        @error('about')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
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
