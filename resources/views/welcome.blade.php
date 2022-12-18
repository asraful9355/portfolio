<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @foreach($posts as $post)
        <link rel="shortcut icon" href="{{ $post->featured }}" type="image/x-icon">
        @endforeach
        <title>My Portfolio</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Resume Website Template Free Download" name="keywords">
        <meta content="Resume Website Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('frontEnd/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{ asset('frontEnd/lib/slick/slick-theme.css')}}" rel="stylesheet">
        <link href="{{ asset('frontEnd/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet">
    
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <div class="wrapper">
            <div class="sidebar">
                <div class="sidebar-header">
                @foreach($posts as $post)
                    <img src="{{ $post->featured }}" alt="Image" style=" display: block; margin-left:
                        auto;margin-right: auto; width:50%;   border-radius: 50%; ">
                @endforeach
                  
                </div>
                <div class="sidebar-content">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">Navigation</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="nav navbar-nav">
                               <li class="nav-item">
                                    <a class="nav-link" href="#header">{{ $cat_first->name }}<i class="fa fa-home"></i></a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">{{ $cat_second->name }}<i class="fa fa-address-card"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#education">{{ $cat_seven->name }}<i class="fas fa-graduation-cap"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#experience">{{ $cat_third->name }}<i class="fa fa-star"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#service">{{ $cat_four->name }}<i class="fa fa-tasks"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#portfolio">{{ $cat_five->name }}<i class="fa fa-file-archive"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">{{ $cat_six->name }}<i class="fa fa-envelope"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login')}}">Log In<i class="fas fa-sign-in-alt"></i></a>
                                </li>
                               
                               
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="sidebar-footer">
                @foreach($media as $med )
                 <a class="btn" href="{{ $med->url }}">{!! $med->icon !!}</a>
                @endforeach
                </div>
            </div>
            <div class="content">
                @foreach($posts as $post)
                <!-- Header Start -->
                <div class="header" id="header">
                    <div class="content-inner">
                        <p>{{ $post->sub_title}}</p>
                        <h1>{{ $post->title}}</h1>
                      <img src="{{ $post->featured}}" 
                        alt="" style=" display: block; margin-left:
                        auto;margin-right: auto; width:30%;   border-radius:50%;"> 
                        <div class="typed-text">{{$post->skill }}</div>
                    </div>
                   
                </div>
                <!-- Header End -->
                
                <!-- Large Button Start -->
                <div class="large-btn">
                    <div class="content-inner">
                        <a class="btn" href="{{ asset($post->cv ) ?? '#'}}" target="_blank"><i class="fa fa-download"></i>Resume</a>
                        <a class="btn" href="{{ asset($post->btn_url) }}"><i class="fa fa-hands-helping"></i>{{ $post->btn_title }}</a>
                    </div>
                </div>
                <!-- Large Button End -->
                @endforeach
                
                <!-- About Start -->
                <div class="about" id="about">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>{{ $cat_second->name }}</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 col-lg-5">
                            @foreach($tags as $tag)
                                <img src="{{ $post->featured}}" alt="Image" style=" display: block; margin-left:
                        auto;margin-right: auto; width: 50%;   border-radius: 50%;">
                       
                            </div>
                            <div class="col-md-6 col-lg-7">
                                <p>
                                  
                               {{ $tag->myself}}
                    
                                </p>
                                <a class="btn" href="{{ asset($tag->btn_url)}}">{{ $tag->btn_title}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="skills">
                                    <div class="skill-name">
                                        <p>{{ $skill_two->skill }}</p><p>{{ $skill_two->percen}}</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill_two->percen}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="skill-name">
                                        <p>{{ $skill_three->skill}}</p><p>{{ $skill_three->percen}}</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill_three->percen}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="skills">
                                    <div class="skill-name">
                                        <p>{{ $skill_one->skill}}</p><p>{{ $skill_one->percen}}</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill_one->percen}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="skill-name">
                                        <p>{{ $skill_four->skill}}</p><p>{{ $skill_four->percen}}</p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill_four->percen}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About End -->
                
                <!-- Education Start -->
                <div class="education" id="education">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>{{ $cat_seven->name }}</h2>
                        </div>
                        <div class="row align-items-center">
                        @foreach($education as $edu )
                            <div class="col-md-6">
                                <div class="edu-col">
                                    <span> {{$edu->year}}</span>
                                    <h3>{{ $edu->exam}}</h3>
                                    <p>{{$edu->institute }}</p>
                                    <p>{{$edu->dept}}</p>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
                <!-- Education Start -->
                
                <!-- Experience Start -->
                <div class="experience" id="experience">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>{{ $cat_third->name }}</h2>
                        </div>
                        <div class="row align-items-center">
                         @foreach($experience as $exp )
                            <div class="col-md-6">
                                <div class="exp-col">
                                    <span>{{ $exp->join_end }}</span>
                                    <h3>{{ $exp->company}}</h3>
                                    <h4>{{ $exp->place }}</h4>
                                    <h5>{{ $exp->job_title }}</h5>
                            
                                </div>
                            </div>
                        @endforeach
                    
                        </div>
                    </div>
                </div>
                <!-- Experience Start -->
                
                <!-- Service Start -->
                <div class="service" id="service">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>{{ $cat_four->name }}</h2>
                        </div>
                        <div class="row align-items-center">
                        @foreach($services as $service )
                            <div class="col-md-6">
                                <div class="srv-col">
                                   {!! $service->icon_link !!}
                                    <h3>{{$service->title }}</h3>
                                    <p>{{ $service->sub_title }}</p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- Service Start -->
                
                <!-- Portfolio Start -->
                <div class="portfolio" id="portfolio">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>Portfolio</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul id="portfolio-flters">
                                    <li data-filter="*" class="filter-active">{{$sub_one->name }}</li>
                                    <li data-filter=".web-des">{{$sub_two->name }}</li>
                                    <li data-filter=".web-dev">{{$sub_three->name }}</li>
                                    <li data-filter=".dig-mar">{{$sub_four->name }}</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="row portfolio-container">
                            @foreach($category_one->works()->get() as $work)
                            <div class="col-lg-4 col-md-6 portfolio-item web-des">
                                <div class="portfolio-wrap">
                                    <figure>
                                        <img src="{{ $work->featured}}" class="img-fluid" alt="">
                                        <a href="{{ $work->featured}}" data-lightbox="portfolio" data-title="Project Name" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                                        <a class="portfolio-title" href="#">Project Name <span>{{$work->sub_category->name }}</span></a>
                                    </figure>
                                </div>
                            </div>
                            @endforeach
                            @foreach($category_two->works()->get() as $work)
                            <div class="col-lg-4 col-md-6 portfolio-item web-dev">
                                <div class="portfolio-wrap">
                                    <figure>
                                        <img src="{{ $work->featured }}" class="img-fluid" alt="">
                                        <a href="{{ $work->featured}}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                                        <a class="portfolio-title" href="#">Project Name <span>{{$work->sub_category->name }}</span></a>
                                    </figure>
                                </div>
                            </div>
                            @endforeach
                            @foreach($category_three->works()->get() as $work)
                            <div class="col-lg-4 col-md-6 portfolio-item dig-mar">
                                <div class="portfolio-wrap">
                                    <figure>
                                        <img src="{{ $work->featured }}" class="img-fluid" alt="">
                                        <a href="{{ $work->featured }}" class="link-preview" data-lightbox="portfolio" data-title="Project Name" title="Preview"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="link-details" title="More Details"><i class="fa fa-link"></i></a>
                                        <a class="portfolio-title" href="#">Project Name <span>{{$work->sub_category->name }}</span></a>
                                    </figure>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <!-- Portfolio end-->
                
                <!-- Review Start -->
                <div class="review" id="review">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>Review</h2>
                        </div>
                        <div class="row align-items-center review-slider">
                         @foreach($reviews as $review )
                            <div class="col-md-12">
                                <div class="review-slider-item">
                                    <div class="review-text">
                                        <p>
                                           {{ $review->about }}
                                        </p>
                                    </div>
                                    <div class="review-img">
                                        <img src="{{ $review->featured }}" alt="Image">
                                        <div class="review-name">
                                            <h3>{{ $review->name }}</h3>
                                            <p>{{ $review->proffesion}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           @endforeach
                        </div>
                    </div>
                </div>
                <!-- Review End -->
                
                <!-- Contact Start -->
                <div class="contact" id="contact">
                    <div class="content-inner">
                        <div class="content-header">
                            <h2>{{ $cat_six->name }}</h2>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                @foreach( $contact as $con)
                                <div class="contact-info">
                                    <p><i class="fa fa-user"></i> {{ $con->name }}</p>
                                    <p><i class="fa fa-tag"></i>{{ $con->proffesion }}</p>
                                    <p><i class="fa fa-envelope"></i><a href="mailto:info@example.com">{{ $con->email }}</a></p>
                                    <p><i class="fa fa-phone"></i><a href="tel:+1234567890">{{ $con->number }}</a></p>
                                    <p><i class="fa fa-map-marker"></i>{{ $con->address }}</p>
                                    <div class="social">
                                      @foreach($media as $med )
                                        <a class="btn" href="{{ $med->url }}">{!! $med->icon !!}</a>
                                       @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <div class="form">
                                    <form id="my-form" action="https://formspree.io/f/xaykyege" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="name" class="form-control" placeholder="Your Name" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" class="form-control"  name="email" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject" />
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Message" name = "message"></textarea>
                                        </div>
                                        <div><button class="btn" type="submit">Send Message</button></div>
                                        <p id="my-form-status"></p>
                                    </form>
                                </div>
                              
                               <!-- Place this script at the end of the body tag -->
                              <script>
                                  var form = document.getElementById("my-form");
                                  
                                  async function handleSubmit(event) {
                                    event.preventDefault();
                                    var status = document.getElementById("my-form-status");
                                    var data = new FormData(event.target);
                                    fetch(event.target.action, {
                                      method: form.method,
                                      body: data,
                                      headers: {
                                          'Accept': 'application/json'
                                      }
                                    }).then(response => {
                                      if (response.ok) {
                                        status.innerHTML = "Thanks for your submission!";
                                        form.reset()
                                      } else {
                                        response.json().then(data => {
                                          if (Object.hasOwn(data, 'errors')) {
                                            status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
                                          } else {
                                            status.innerHTML = "Oops! There was a problem submitting your form"
                                          }
                                        })
                                      }
                                    }).catch(error => {
                                      status.innerHTML = "Oops! There was a problem submitting your form"
                                    });
                                  }
                                  form.addEventListener("submit", handleSubmit)
                               </script>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- Contact End -->
                
                <!-- Footer Start -->
                <div class="footer">
                    <div class="content-inner">
                        <div class="row align-items-center">
                         @foreach($copyRight as $copy)
                            <div class="col-md-6">
                                <p>&copy; Copyright <a href="{{ $copy->link }}">{{ $copy->name }}</a>. All Rights Reserved</p>
                            </div>
                            <div class="col-md-6">
                                <p>Powered by <a href="{{ $copy->link }}">{{ $copy->name }}</a></p>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div>
                <!-- Footer Start -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontEnd/lib/easing/easing.min.js')}}"></script>
        <script src="{{ asset('frontEnd/lib/slick/slick.min.js')}}"></script>
        <script src="{{ asset('frontEnd/lib/typed/typed.min.js')}}"></script>
        <script src="{{ asset('frontEnd/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{ asset('frontEnd/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontEnd/lib/lightbox/js/lightbox.min.js')}}"></script>
        
        <!-- Template Javascript -->
        <script src="{{ asset('frontEnd/js/main.js')}}"></script>
    </body>
</html>
