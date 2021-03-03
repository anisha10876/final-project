<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hello admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admindashboard')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('brands')}}">Brands</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('carsadmin')}}">Cars</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('faqs')}}">FAQs</a>
            </li>
                <a class="nav-link" href="{{route('teams')}}">Teams</a>
            </li>
            </li>
                <a class="nav-link" href="{{route('testomonials')}}">Testomonials</a>
            </li>
            </li>
                <a class="nav-link" href="{{route('blogs')}}">Blog</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
        </ul>

        <form method="get" action="{{ route('searchcar') }}" class="form-inline my-2 my-lg-0 mr-5">
            @csrf
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        {{-- <span class="navbar-text">
      Navbar text with an inline element
    </span> --}}

    </div>
</nav>
