@extends('layouts.app') @section('content')

<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Update Service</h3>
                            <a href="{{ route('service.index')}}" class="btn btn-primary">Go Experience Background</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('service.update',['id'=>$service->id]) }}" method="post" >
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title"> Service Title  </label>
                                            <input type="text" name="title" class="form-control"  value="{{ $service->title }}" />
                                        </div>
                                        @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Icon Link</label>
                                            <input type="text" name="icon_link" class="form-control"  value="{{ $service->icon_link}}" />
                                        </div>
                                        @error('icon_link')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Sub title</label>
                                            <input type="text" name="sub_title" class="form-control" value="{{ $service->sub_title }}" />
                                        </div>
                                        @error('sub_title')
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
