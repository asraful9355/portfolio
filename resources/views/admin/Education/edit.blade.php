@extends('layouts.app') @section('content')

<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Update Education Background</h3>
                            <a href="{{ route('edu.index')}}" class="btn btn-primary">Go Education Background</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('edu.update',['id'=>$edu->id]) }}" method="post" >
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Examinations: </label>
                                            <input type="text" name="exam" class="form-control" value="{{ $edu->exam}}"  />
                                        </div>
                                        @error('exam')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Department:</label>
                                            <input type="text" name="dept" class="form-control" value="{{ $edu->dept}}"  />
                                        </div>
                                        @error('dept')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Institute Name:</label>
                                            <input type="text" name="institute" class="form-control"  value="{{ $edu->institute}}" />
                                        </div>
                                        @error('institute')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="year">Passing year</label>
                                            <input type="year" name="year" class="form-control" value="{{ $edu->year}}" />
                                        </div>
                                        @error('year')
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
