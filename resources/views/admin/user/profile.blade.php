@extends('layouts.app')
@section('content')

<!-- nice card ruhul amin theke neowa -->
<div class="card-header mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="card-title">My Profile</h3>
      
    </div>
</div>
<section style="background-color: #eee;"> 
  <div class="container py-5">
    <div class="row">
      
      <div class="col-lg-4">
        <div class="card mb-4 bg-info text-light ">
          <div class="card-body text-center">
            <img src="{{ asset($users->profile_photo_path) }}"" alt="avatar"
              class="rounded-circle img-fluid ms-5" style="width: 150px;">
            <h5 class="my-3">{{ $users->name }}</h5>
            <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">{{ $profile->address }}</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0 ">
            <ul class="list-group list-group-flush rounded-3">
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark text-light">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">{{ $profile->twitter}}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark text-light">
                <i class="fab fa-youtube fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">{{ $profile->youtube}}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3 bg-dark  text-light">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">{{ $profile->facebook}}</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $users->name }} </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $users->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ID NO</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $users->id }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->mobaile }} </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-">{{ $profile->address }} </p>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection