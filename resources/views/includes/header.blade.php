 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      @php
       $posts = App\Models\Post::latest()->get();
      @endphp
        <div class="image">
          @foreach($posts as $post)
          <img src="{{asset($post->featured) }}" class="img-circle elevation-2" alt="User Image">
          @endforeach
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      @php
      $route = Route::current()->getName();
      @endphp

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard')}}" class="nav-link {{ ($route == 'dashboard')? 'active':'' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link 
              {{ ($route == 'category.create')? 'active':'' }}
              {{ ($route == 'index.category')? 'active':'' }}
            ">
            <i class="fas fa-band-aid"></i>
              <p>
               Category
               <i class="fa fas-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

              <li class="nav-item">
                <a href="{{ route('category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
               
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            
            {{ ($route == 'create.post')? 'active':'' }}
              {{ ($route == 'index.post')? 'active':'' }}
              {{ ($route == 'trash.post')? 'active':'' }}
            ">
            <i class="fas fa-home"></i>
              <p>
              Home
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item ">
                <a href="{{ route('create.post') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Home Item</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('index.post') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Home Item</p>
                </a>
              </li>
             
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
              {{ ($route == 'create.tag')? 'active':'' }}
              {{ ($route == 'index.tag')? 'active':'' }}
              {{ ($route == 'skill.create')? 'active':'' }}
         
            ">
            <i class="fas fa-users"></i>
              <p>
             About Me 
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
        
              <li class="nav-item">
                <a href="{{ route('create.tag') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Me Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('skill.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skills Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('index.tag') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All About Me </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            {{ ($route == 'edu.create')? 'active':'' }}
            {{ ($route == 'edu.index')? 'active':'' }}
             
         
            ">
            <i class="fa fa-graduation-cap"></i>
              <p>
           Education
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
        
              <li class="nav-item">
                <a href="{{ route('edu.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Education Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('edu.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Education All</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
              {{ ($route == 'user.index')? 'active':'' }}
              {{ ($route == 'user.create')? 'active':'' }}
            
            ">
            <i class="far fa-user"></i>
              <p>
               User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
        
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="{{ route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All User</p>
                </a>
              </li>
            </ul>
          </li>
        

          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            
            {{ ($route == 'exp.create')? 'active':'' }}
              {{ ($route == 'exp.index')? 'active':'' }}
            
            
            ">
            <i class="fa fa-laptop-house"></i>
              <p>
               Experience
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('exp.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Experience Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('exp.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Experience</p>
                </a>
              </li>
           
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link 
            
            {{ ($route == 'service.create')? 'active':'' }}
              {{ ($route == 'service.index')? 'active':'' }}
            
            
            
            ">
            <i class="fab fa-usps"></i>
              <p>
             Service
                <i class="fas fa-angle-left right"></i>
         
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('service.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Service </p>
                </a>
              </li>
             
         
             
            </ul>
          </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            {{ ($route == 'sub_category.create')? 'active':'' }}
              {{ ($route == 'work.create')? 'active':'' }}
              {{ ($route == 'work.index')? 'active':'' }}
            
            ">
            <i class="far fa-address-card"></i>
              <p>
           Portfolio
                <i class="fas fa-angle-left right"></i>
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('sub_category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('work.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Work </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('work.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Index Work </p>
                </a>
              </li>
             
         
             
            </ul>
          </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
             {{ ($route == 'client.create')? 'active':'' }}
              {{ ($route == 'client.index')? 'active':'' }}
          
            ">
            <i class="fa-brands fa-readme"></i>
              <p>
             Review
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('client.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('client.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Client </p>
                </a>
              </li>
             
            </ul>
          </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            {{ ($route == 'contact.create')? 'active':'' }}
            {{ ($route == 'contact.index')? 'active':'' }}
            {{ ($route == 'media.create')? 'active':'' }}
            {{ ($route == 'media.index')? 'active':'' }}
            
            
            ">
            <i class="fa fa-phone"></i>
              <p>
             contact
                <i class="fas fa-angle-left right"></i>
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('contact.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact About Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Contact About </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('media.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Media Icon Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('media.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Media Icon</p>
                </a>
              </li>
    
         
             
            </ul>
          </li>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            {{ ($route == 'copy.create')? 'active':'' }}
            {{ ($route == 'copy.index')? 'active':'' }}
            
           ">
           <i class="fa fa-copyright"></i>
              <p>
           Copy Right
                <i class="fas fa-angle-left right"></i>
          
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <li class="nav-item">
                <a href="{{route('copy.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Copy right Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('copy.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Copy right </p>
                </a>
              </li>
              
             
         
             
            </ul>
          </li>
         </ul>
      </nav>
       <!-- /.sidebar-menu --> 