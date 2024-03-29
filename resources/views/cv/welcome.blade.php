<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vladislav Yarlykov - back-end developer PHP/Laravel</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{asset('css/font-awesome/css/all.min.css?ver=1.2.1')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.min.css?ver=1.2.1')}}" rel="stylesheet">
    <link href="{{asset('css/aos.css?ver=1.2.1')}}" rel="stylesheet">
    <link href="{{asset('css/main.css?ver=1.2.1')}}" rel="stylesheet">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>
<body class="bg-light" id="top">
<header class="d-print-none">
    <div class="container text-center text-lg-left">
        <div class="pt-4 clearfix">
            <h1 class="site-title mb-0"><a href="/">{{$data['name']}}</a></h1>
            <div class="site-nav">
                <nav role="navigation">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="#about" title="About"><span class="menu-title">About</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#skills" title="Skills"><span class="menu-title">Skills</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#experience" title="Experience"><span class="menu-title">Experience</span></a>
                        </li>
{{--                        <li class="nav-item"><a class="nav-link" href="#education" title="Education"><span class="menu-title">Education</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="#portfolio" title="Portfolio"><span class="menu-title">Portfolio</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="#references" title="References"><span class="menu-title">References</span></a>--}}
{{--                        </li>--}}
                        <li class="nav-item"><a class="nav-link" href="#contact" title="Contact"><span class="menu-title">Contact</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="page-content">
    <div class="container">
        @include('partials.errors')
        <div class="resume-container">
            <div class="shadow-1-strong bg-white my-5" id="intro">
                <div class="bg-info text-white">
                    <div class="cover bg-image"><img src="{{asset('images/header-background.jpg')}}"/>
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);backdrop-filter: blur(2px);">
                            <div class="text-center p-5">
                                <div class="avatar p-1"><img class="img-thumbnail shadow-2-strong" src="{{asset('images/avatar.jpg')}}" width="160" height="160"/></div>
                                <div class="header-bio mt-3">
                                    <div data-aos="zoom-in" data-aos-delay="0">
                                        <h2 class="h1">{{$data['name']}}</h2>
                                        <p>{{$data['header']}}</p>
                                    </div>
                                    <div class="header-social mb-3 d-print-none" data-aos="zoom-in" data-aos-delay="200">
                                        <nav role="navigation">
                                            <ul class="nav justify-content-center">
{{--                                                <li class="nav-item"><a class="nav-link" href="https://twitter.com/templateflip" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a>--}}
{{--                                                </li>--}}
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{$data['facebook']}}" title="Facebook" target="_blank">
                                                        <i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{$data['instagram']}}" title="Instagram" target="_blank">
                                                        <i class="fab fa-instagram"></i><span class="menu-title sr-only">Instagram</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{$data['github']}}" title="Github" target="_blank">
                                                        <i class="fab fa-github"></i><span class="menu-title sr-only">Github</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{$data['linkedIn']}}" title="LinkedIn" target="_blank">
                                                        <i class="fab fa-linkedin"></i><span class="menu-title sr-only">LinkedIn</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="d-print-none">
{{--                                        <a class="btn btn-outline-light btn-lg shadow-sm mt-1 me-3" href="material-resume.pdf" data-aos="fade-right" data-aos-delay="700">Download CV</a>--}}
                                        <a class="btn btn-info btn-lg shadow-sm mt-1" href="#contact" data-aos="fade-left" data-aos-delay="700">Hire Me</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow-1-strong bg-white my-5 p-5" id="about">
                <div class="about-section">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="h2 fw-light mb-4">About Me</h2>
                            <p>{{$data['about'] ?? ''}}</p>
                        </div>
                        <div class="col-md-5 offset-lg-1">
                            <div class="row mt-2">
                                <h2 class="h2 fw-light mb-4">Bio</h2>
                                <div class="col-sm-5">
                                    <div class="pb-2 fw-bolder"><i class="far fa-calendar-alt pe-2 text-muted" style="width:24px;opacity:0.85;"></i>Age</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="pb-2">{{$data['age']}}</div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pb-2 fw-bolder"><i class="far fa-envelope pe-2 text-muted" style="width:24px;opacity:0.85;"></i>Email</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="pb-2">{{$data['email']}}</div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="pb-2 fw-bolder"><i class="fab fa-telegram pe-2 text-muted" style="width:24px;opacity:0.85;"></i>Telegram</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="pb-2"><a target="_blank" href="https://t.me/{{$data['telegram']}}">{{'@'.$data['telegram']}}</a></div>
                                </div>
{{--                                <div class="col-sm-5">--}}
{{--                                    <div class="pb-2 fw-bolder"><i class="fas fa-phone pe-2 text-muted" style="width:24px;opacity:0.85;"></i>Phone</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-7">--}}
{{--                                    <div class="pb-2">--}}
{{--                                        @foreach($data['phones'] as $phone)--}}
{{--                                            <span><a href=tel:{{$phone}}>{{$phone}}</a></span><br>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-sm-5">
                                    <div class="pb-2 fw-bolder"><i class="fas fa-map-marker-alt pe-2 text-muted" style="width:24px;opacity:0.85;"></i>Dislocation</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="pb-2">{{$data['dislocation']}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow-1-strong bg-white my-5 p-5" id="skills">
                <div class="skills-section">
                    <h2 class="h2 fw-light mb-4">Professional Skills</h2>
                    <div class="row">
                        @foreach($data['skills'] as $key => $skill)
                            <div class="col-md-6">
                                <div class="mb-3"><span class="fw-bolder">{{$key}}</span>
                                    <div class="progress my-2 rounded" style="height: 20px">
                                        <div class="progress-bar bg-info" role="progressbar" data-aos="zoom-in-right"
                                             data-aos-delay="100" data-aos-anchor=".skills-section" style="width: {{$skill['value']}}%;"
                                             aria-valuenow="{{$skill['value']}}" aria-valuemin="0" aria-valuemax="100">{{$skill['title']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mb-3"><span class="fw-bolder">Linux-administration</span>--}}
{{--                                <div class="progress my-2 rounded" style="height: 20px">--}}
{{--                                    <div class="progress-bar bg-secondary" role="progressbar" data-aos="zoom-in-right"--}}
{{--                                         data-aos-delay="500" data-aos-anchor=".skills-section" style="width: 65%"--}}
{{--                                         aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">Middle--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3"><span class="fw-bolder">Management Skills</span>--}}
{{--                                <div class="progress my-2 rounded" style="height: 20px">--}}
{{--                                    <div class="progress-bar bg-secondary" role="progressbar" data-aos="zoom-in-right"--}}
{{--                                         data-aos-delay="600" data-aos-anchor=".skills-section" style="width: 65%"--}}
{{--                                         aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">Middle--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3"><span class="fw-bolder">C# / Unity</span>--}}
{{--                                <div class="progress my-2 rounded" style="height: 20px">--}}
{{--                                    <div class="progress-bar bg-secondary" role="progressbar" data-aos="zoom-in-right"--}}
{{--                                         data-aos-delay="400" data-aos-anchor=".skills-section" style="width: 55%"--}}
{{--                                         aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">Beginner--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3"><span class="fw-bolder">English</span>--}}
{{--                                <div class="progress my-2 rounded" style="height: 20px">--}}
{{--                                    <div class="progress-bar bg-secondary" role="progressbar" data-aos="zoom-in-right"--}}
{{--                                         data-aos-delay="400" data-aos-anchor=".skills-section" style="width: 55%"--}}
{{--                                         aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">Intermediate--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="shadow-1-strong bg-white my-5 p-5" id="experience">
                <div class="work-experience-section">
                    <h2 class="h2 fw-light mb-4">Work Experience</h2>
                    <div class="timeline">
                        @foreach(array_reverse($data['works']) as $key => $work)
                            <div class="timeline-card timeline-card-info" data-aos="fade-in" data-aos-delay="0">
                                <div class="timeline-head px-4 pt-3">
                                    <div class="h5">
                                        PHP/Laravel developer<span class="text-muted h6"> at
                                            <a target="_blank" href="{{$work['link']}}">{{$key}}</a></span></div>
                                </div>
                                <div class="timeline-body px-4 pb-4">
                                    <div class="text-muted text-small mb-3">{{$work['from']}} - {{$work['to']}}</div>
                                    <div>{{$work['desc']}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
{{--            <div class="shadow-1-strong bg-white my-5 p-5" id="education">--}}
{{--                <div class="education-section">--}}
{{--                    <h2 class="h2 fw-light mb-4">Education</h2>--}}
{{--                    <div class="timeline">--}}
{{--                        <div class="timeline-card timeline-card-success" data-aos="fade-in" data-aos-delay="0">--}}
{{--                            <div class="timeline-head px-4 pt-3">--}}
{{--                                <div class="h5">Masters in Information Technology <span class="text-muted h6">from International University</span>          </div>--}}
{{--                            </div>--}}
{{--                            <div class="timeline-body px-4 pb-4">--}}
{{--                                <div class="text-muted text-small mb-3">2011 - 2013</div>--}}
{{--                                <div>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="timeline-card timeline-card-success" data-aos="fade-in" data-aos-delay="200">--}}
{{--                            <div class="timeline-head px-4 pt-3">--}}
{{--                                <div class="h5">Bachelor of Computer Science <span class="text-muted h6">from Regional College</span>          </div>--}}
{{--                            </div>--}}
{{--                            <div class="timeline-body px-4 pb-4">--}}
{{--                                <div class="text-muted text-small mb-3">2007 - 2011</div>--}}
{{--                                <div>Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="timeline-card timeline-card-success" data-aos="fade-in" data-aos-delay="400">--}}
{{--                            <div class="timeline-head px-4 pt-3">--}}
{{--                                <div class="h5">Science and Mathematics <span class="text-muted h6">from Mt. High Scool</span>          </div>--}}
{{--                            </div>--}}
{{--                            <div class="timeline-body px-4 pb-4">--}}
{{--                                <div class="text-muted text-small mb-3">1995 - 2007</div>--}}
{{--                                <div>User generated content in real-time will have multiple touchpoints for offshoring. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="shadow-1-strong bg-white my-5 p-5 d-print-none" id="portfolio">--}}
{{--                <div class="portfolio-section">--}}
{{--                    <h2 class="h2 fw-light mb-4">Portfolio</h2>--}}
{{--                    <div class="row g-0">--}}
{{--                        <div class="col-md-6"><a href="https://dribbble.com/" target="_blank"><img class="img-fluid" src="{{asset('images/project-1.jpg')}}" width="800" height="500"/></a></div>--}}
{{--                        <div class="col-md-6 d-flex align-items-center" data-aos="fade-left" data-aos-delay="100">--}}
{{--                            <div class="m-4 mt-md-2">--}}
{{--                                <p class="text-teal text-small">Frontend / HTML / CSS / JavaScript</p>--}}
{{--                                <h3>Photo Agency Website</h3>--}}
{{--                                <p class="text-muted">Built highly performant website front end for a Photography agency. Delivered codebase in HTML, CSS and modern JavaScript.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row g-0 portfolio-reverse">--}}
{{--                        <div class="col-md-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">--}}
{{--                            <div class="m-4 mt-md-2 text-end">--}}
{{--                                <p class="text-teal text-small">Graphic Design / Photoshop / Sketch</p>--}}
{{--                                <h3>Restaurant Website Design</h3>--}}
{{--                                <p class="text-muted">Web design for popular resturant chain involving complex layouts done in both Photoshop and Sketch. Collaborated with back-end and front-end team for finished product.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6"><a href="https://www.behance.net/" target="_blank"><img class="img-fluid" src="{{asset('images/project-2.jpg')}}" width="800" height="500"/></a></div>--}}
{{--                    </div>--}}
{{--                    <div class="row g-0">--}}
{{--                        <div class="col-md-6"><a href="https://dribbble.com/" target="_blank"><img class="img-fluid" src="{{asset('images/project-3.jpg')}}" width="800" height="500"/></a></div>--}}
{{--                        <div class="col-md-6 d-flex align-items-center" data-aos="fade-left" data-aos-delay="100">--}}
{{--                            <div class="m-4 mt-md-2">--}}
{{--                                <p class="text-teal text-small">Frontend / HTML / CSS / JavaScript</p>--}}
{{--                                <h3>E-Commerce Website</h3>--}}
{{--                                <p class="text-muted">Built highly performant website for an E-commerce Portal. Worked with back-end team to timely deliver codebase in HTML, CSS and modern JavaScript.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="shadow-1-strong bg-white my-5 p-5" id="references">--}}
{{--                <div class="reference-section">--}}
{{--                    <h2 class="h2 fw-light mb-4">References</h2>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="d-flex mb-2">--}}
{{--                                <div class="avatar"><img src="{{asset('images/reference-image-1.jpg')}}" width="60" height="60"/></div>--}}
{{--                                <div class="header-bio m-3 mb-0">--}}
{{--                                    <h3 class="h6 mb-1" data-aos="fade-left" data-aos-delay="0">Aiyana</h3>--}}
{{--                                    <p class="text-muted text-small" data-aos="fade-left" data-aos-delay="100">CEO / Web Design Company</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex"><i class="text-secondary fas fa-quote-left"></i>--}}
{{--                                <p class="lead mx-2" data-aos="fade-left" data-aos-delay="100">Walter displays exemplary professionalism and is able to take on challenges. He learns quickly and is an asset to any team.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="d-flex mb-2">--}}
{{--                                <div class="avatar"><img src="{{asset('images/reference-image-2.jpg')}}" width="60" height="60"/></div>--}}
{{--                                <div class="header-bio m-3 mb-0">--}}
{{--                                    <h3 class="h6 mb-1" data-aos="fade-left" data-aos-delay="0">Alexander</h3>--}}
{{--                                    <p class="text-muted text-small" data-aos="fade-left" data-aos-delay="100">Front-end Developer / Web Design Company</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex"><i class="text-secondary fas fa-quote-left"></i>--}}
{{--                                <p class="lead mx-2" data-aos="fade-left" data-aos-delay="100">Walter is a great co-worker and problem solver. He is quick to extend his helping hand and makes a good team player.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="shadow-1-strong bg-white my-5 p-5" id="contact">
                <div class="contant-section">
                    <h2 class="h2 fw-light text mb-4">Contact</h2>
                    <div class="row mb-6">
                        <div class="col-md-6" data-aos="fade-center" data-aos-delay="200">
                            <div class="mt-1">
{{--                                <div class="h6"><i class="fas fa-phone pe-2 text-muted" style="width:24px;opacity:0.85;"></i> {{$data['phones'][0]}}</div>--}}
                                <div class="h6"><i class="far fa-envelope pe-2 text-muted" style="width:24px;opacity:0.85;"></i> {{$data['email']}}</div>
                            </div>
                            <div class="mt-5 d-print-none">
                                <form action="{{route('cv.sendMail')}}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" id="name" name="name" class="form-control" required/>
                                        <label class="form-label" for="name">Name</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control" required/>
                                        <label class="form-label" for="email">Email address</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <textarea class="form-control" style="resize: none;" id="message" name="text" rows="4" required></textarea>
                                        <label class="form-label" for="message">Message</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        {!! app('captcha')->display() !!}
                                    </div>
                                    <button class="btn btn-info btn-block mb-4" type="submit">Send</button>
                                </form>
                            </div>
                        </div>
{{--                        <div class="col-md-7 d-print-none" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496.9774799129763!2d-73.98032087190995!3d40.765927126473905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258f9cfcb250d%3A0xdb570ddcb766e3a8!2sNew%20York%20City%20Center!5e0!3m2!1sen!2sin!4v1614183731149!5m2!1sen!2sin" width="500" height="400" style="border:0;width:100%;" allowfullscreen="" loading="lazy"></iframe></div>--}}
                    </div>
                </div>
            </div>
        </div></div>
</div>
<footer class="pt-4 pb-4 text-muted text-center d-print-none">
    <div class="container">
        <div class="my-3">
            <div class="h4">Vladislav Yarlykov</div>
            <div class="footer-nav">
                <nav role="navigation">
                    <ul class="nav justify-content-center">
{{--                        <li class="nav-item"><a class="nav-link" href="https://twitter.com/templateflip" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/templateflip" title="Facebook"><i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/templateflip" title="Instagram"><i class="fab fa-instagram"></i><span class="menu-title sr-only">Instagram</span></a>--}}
{{--                        </li>--}}
                        <li class="nav-item"><a class="nav-link" href="https://github.com/badordos" title="Github"><i class="fab fa-github"></i><span class="menu-title sr-only">Github</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="text-small">
            <div class="mb-1">&copy; Material Resume. All rights reserved.</div>
            <div>Design - <a href="https://templateflip.com/" target="_blank">TemplateFlip</a></div>
        </div>
    </div>
</footer>
<script src="{{asset('js/mdb.min.js?ver=1.2.1')}}"></script>
<script src="{{asset('js/aos.js?ver=1.2.1')}}"></script>
<script src="{{asset('js/main.js?ver=1.2.1')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
