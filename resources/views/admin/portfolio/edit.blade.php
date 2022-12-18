@extends('layouts.app') @section('content')
<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">update work</h3>
                            <a href="{{ route('work.index') }}" class="btn btn-primary">Go Back To Work List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('work.update',['id'=>$work->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group mt-5">
                                            <label for="name">Skill:</label>
                                            <input type="text" name="skill" class="form-control" id="myself" placeholder="type your skill" value="{{ $work->skill }}" />
                                        </div>
                                        @error('skill')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <label for="featured">Featured Image:</label>
                                            <div class="col-md-12">
                                               
                                                <div class="custom-file">
                                                    <input type="file" name="featured" class="form-control-file border mt-3 mb-3" id="image" value="{{ $work->featured }}" />
                                                </div>
                                            </div>
                                            @error('featured')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                      </div>

                                      <div class="form-group">
                                         <label for="category">Select a Category</label>
                                         <select name="category_id" id="category" class="form-control" value="{{ old('category_id') }}" >

                                          @foreach($categories as $category)
                                             <option value="{{ $category->id }}"
                                             @if($work->sub_category_id == $category->id)
                                             selected
                                             @endif
                                             >{{ $category->name }}</option>
                                            
                                          @endforeach
                                           
                                         </select>
                                       </div>
                                       @error('category_id')
                                          <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-success btn-lg" value="Update Now" />
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
