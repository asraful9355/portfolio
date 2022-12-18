@extends('layouts.app') @section('content')

<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Update Experience Background</h3>
                            <a href="{{ route('exp.index')}}" class="btn btn-primary">Go Experience Background</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('exp.update',['id'=>$exp->id]) }}" method="post" >
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Company Name: </label>
                                            <input type="text" name="company" class="form-control" value="{{ $exp->company }}" />
                                        </div>
                                        @error('company')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Company Place:</label>
                                            <input type="text" name="place" class="form-control" value="{{ $exp->place }}"/>
                                        </div>
                                        @error('place')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Joining & Ending Date:</label>
                                            <input type="text" name="join_end" class="form-control" value="{{ $exp->join_end}}" />
                                        </div>
                                        @error('join_end')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="year">Job Title </label>
                                            <input type="year" name="job_title" class="form-control"  value="{{ $exp->job_title }}"/>
                                        </div>
                                        @error('job_title')
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
