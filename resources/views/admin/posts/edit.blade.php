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
                            <h3 class="card-title"> Update Home Item </h3>
                            <a href="{{ route('index.post') }}" class="btn btn-primary">Go Back Home List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('update.post',['id'=>$post->id]) }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                   
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="name">Sub Title:</label>                                              
                                            <input type="text" name="sub_title" class="form-control" id="sub_title " placeholder="please Sub title here" value="{{ $post->sub_title }}">
                                        </div>
                                        @error('sub_title')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="name">Title:</label><input type="text" name="title" class="form-control" id="title" placeholder="please title here" value="{{ $post->title }}">
                                        </div>
                                        @error('title')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="skill">Skill:</label><input type="text" name="skill" class="form-control" id="skill" placeholder="please skill here" value="{{ $post->skill }}">
                                        </div>
                                        @error('skill')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="category">Category_Id:</label>
                                            <select name="category_id" id="category" class="form-control">
                                                @foreach($categories as $cat )
                                                <option value="{{ $cat->id }}" @if ($cat->id == $post->category_id) selected @endif >{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                         <div class="row mb-2">
                                          <label for="image">Featured Image:</label>
                                          <div class="col-md-12">
                                              <img id="showImage" src="https://banglanews24.falgunibazar.com/uploads/default.jpg" class="user_img" alt="" style="width: 120px; height: 120px;">
                                              <div class="custom-file">
                                                  <input type="file" name="featured" class="form-control-file border mt-3 mb-3" id="image" value="{{ $post->featured }}">
                                              </div>
                                          </div>
                                          @error('featured')
                                          <p class="text-danger">{{ $message }}</p>
                                          @enderror
                                           </div>
                                         <div class="row mt-3">
                                          <label for="cv">Cv file :</label>
                                          <div class="col-md-12 mb-5">
                                             <div class="custom-file">
                                                  <input type="file" name="cv" class="form-control-file border mt-3 mb-3" id="cv" value="{{ $post->cv }}">
                                              </div>
                                          </div>
                                          @error('cv')
                                          <p class="text-danger">{{ $message }}</p>
                                          @enderror
                                           </div>

                                           <div class="form-group">
                                            <label for="name">Button Title:</label>                                              
                                            <input type="text" name="btn_title" class="form-control" id="sub_title " placeholder="please button title here" value="{{ $post->btn_title }}">
                                        </div>
                                        @error('btn_title')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                           <div class="form-group">
                                            <label for="name">Button Url:</label>                                              
                                            <input type="text" name="btn_url" class="form-control" id="btn_url" placeholder="please button url here" value="{{ $post->btn_url }}">
                                        </div>
                                        @error('btn_url')
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
