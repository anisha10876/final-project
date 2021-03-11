@extends('frontent.layout.app')
@section('main')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Read our <em>Blog</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Blog Start ***** -->
<section class="section" id="our-classes">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-8">
                <section class='tabs-content'>
                    @foreach($blogs as $blog)
                    <article>
                        <img src="{{asset($blog->image)}}" alt="Blog Image">
                        <h4>{{$blog->name}}</h4>

                        <p>
                            <i class="fa fa-user"></i>{{$blog->author}} &nbsp;|&nbsp;
                            <i class="fa fa-calendar"></i> {{$blog->created_at->format('Y-m-d')}} &nbsp;|&nbsp;
                        </p>
                        <p>{{ substr($blog->description, 1, 100).'....' }}</p>
                        <div class="main-button">
                            <a href="{{route('blogdetail',$blog->id)}}">Continue Reading</a>
                        </div>
                    </article>

                    <br>
                    <br>
                    @endforeach

                </section>
            </div>

            <div class="col-lg-4">

                <h5 class="h5">Recent posts</h5>

                <ul>
                    <li>
                        <p><a href="#">Dolorum corporis ullam, reiciendis inventore est repudiandae</a></p>
                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>

                    <li><br></li>

                    <li>
                        <p><a href="#">Culpa ab quasi in rerum dolorum impedit expedita</a></p>
                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>

                    <li><br></li>

                    <li>
                        <p><a href="#">Explicabo soluta corrupti dolor doloribus optio dolorum</a></p>

                        <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
