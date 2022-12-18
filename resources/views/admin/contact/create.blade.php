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
                            <h3 class="card-title">Contact About Add </h3>
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">Go Back to Contact List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{route('contact.store') }}" method="post">
                                    @csrf
                                   
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="name">Your Name:</label>                                              
                                            <input type="text" name="name" class="form-control" id="name" placeholder="type your name here"  value="{{ old('name')}}">
                                        </div>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="name">Proffesion:</label>                                              
                                            <input type="text" name="proffesion" class="form-control" id="proffesion" placeholder="type your proffesion here" value="{{ old('proffesion')}}" >
                                        </div>
                                        @error('proffesion')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="email">Email:</label>                                              
                                            <input type="email" name="email" class="form-control" id="email" placeholder="type your email here" value="{{ old('email')}}" >
                                        </div>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="number">Number:</label>                                              
                                            <input type="number" name="number" class="form-control" id="number" placeholder="type your number here" value="{{ old('number')}}" >
                                        </div>
                                        @error('number')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group">
                                            <label for="address">Address:</label>                                              
                                            <input type="text" name="address" class="form-control" id="address" placeholder="type your address here"  value="{{ old('address')}}">
                                        </div>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                         
                                        <div class="form-group">
                                          <input type="submit" class="btn btn-outline-success btn-lg" value="Create Now">
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
