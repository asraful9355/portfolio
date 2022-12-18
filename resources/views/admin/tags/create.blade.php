@extends('layouts.app') @section('content')
<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Add About Me </h3>
                            <a href="{{ route('index.tag') }}" class="btn btn-primary">Go Back to About List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('store.tag') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label for="name">A little description about yourself</label>
                                            <input type="text" name="myself" class="form-control" id="myself" placeholder="type your little my self" value="{{ old('myself')}}" />
                                        </div>
                                        @error('myself')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <label for="featured">Featured Image:</label>
                                            <div class="col-md-12">
                                               
                                                <div class="custom-file">
                                                    <input type="file" name="featured" class="form-control-file border mt-3 mb-3" id="image" value="{{ old('featured')}}" />
                                                </div>
                                            </div>
                                            @error('featured')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                      </div>

                                        <div class="form-group">
                                            <label for="name">Btn Title </label>
                                            <input type="text" name="btn_title" class="form-control" id="btn_title" placeholder="type btn title name here" value="{{ old('btn_title')}}" />
                                        </div>
                                        @error('btn_title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror


                                        <div class="form-group">
                                            <label for="name">Btn Url:</label>
                                            <input type="text" name="btn_url" class="form-control" id="btn_url" placeholder="type btn url name here" value="{{ old('btn_url')}}" />
                                        </div>
                                        @error('btn_url')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-success btn-lg" value="Create Now" />
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
