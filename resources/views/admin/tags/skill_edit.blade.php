@extends('layouts.app') @section('content')

<!-- Main content -->
<div class="content mt-3">
    <div class="container-fluied">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Update Skill</h3>
                            <a href="{{ route('skill.index') }}" class="btn btn-primary">Go Skills List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('skill.update',['id'=>$skill->id] )}}" method="post" >
                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Skill Name </label>
                                            <input type="skill" name="skill" class="form-control" value="{{ $skill->skill }}" />
                                        </div>
                                        @error('skill')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mt-3">
                                            <label for="featured">Percent</label>
                                            <input type="number" name="percen" class="form-control" value="{{ $skill->percen }}" />
                                        </div>
                                        @error('percen')
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
