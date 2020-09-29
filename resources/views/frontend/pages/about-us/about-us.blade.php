@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>E-Shop||About-us</title>    
@endsection
@section('content')
@section('breadcrumb')

    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="about-us.html">About Us</a></li>
      </ul>

@endsection
@section('shop-content')

  <div class="row">
    <div class="col-md-8" id="content">
        <div class="row">
          <div class="wwd">
            <div class="col-sm-6"><img class="img-responsive" src="{{ asset('frontend/image/blog/blog_4.jpg') }}" alt="#"></div>
            <div class="col-sm-6">
              <div class="column-inner ">
                <div class="wrapper">
                  <h4 class="tf">We made a unique &amp; Beautyfull theme </h4>
                  <div class="desc">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="buttton">
                    <button class="btn">READ MORE</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="services">
              <div class="col-sm-4">
                <h4 class="tf">What we do</h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a class="btn" href="#">Read more</a></p>
              </div>
              <div class="col-sm-4">
                <h4 class="tf">What we do</h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a class="btn" href="#">Read more</a></p>
              </div>
              <div class="col-sm-4">
                <h4 class="tf">What we do</h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a class="btn" href="#">Read more</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="Experiences">
          <div class="col-md-6">
            <h4 class="tf">Experiences</h4>
            <div class="exp-detail">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
        <div class="skill">
          <div class="col-md-6">
            <h4 class="tf">Skills</h4>
            <ul>
              <li>
                <h3>78% Graphic design</h3>
                {{-- <div id="progress1"> </div> --}}
                <div class="dioprogress_radius dioprogress_size_l" style="background: rgb(254, 87, 35); width: 78%; opacity: 1;"></div>
              </li>
              <li>
                <h3>92% web design</h3>
                <div class="dioprogress_radius dioprogress_size_l" style="background: rgb(254, 87, 35); width: 92%; opacity: 1;"></div>
              </li>
              <li>
                <h3>76% Marketing</h3>
                <div id="progress3"> </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 team">
          <h4 class="tf">Our Team </h4>
        </div>
      </div>
      <div class="row team">
        <div class="col-md-3 col-sm-3 team1 ">
          <div class="photo">
            <div class="imageblock"> <img alt="#" src="image/team1.jpg" class="img-responsive"> </div>
            <div class="name"> <a href="#">IBRAHIM ISTALIK</a> </div>
            <h3>Founder and CEO</h3>
            <p>Page editors now use Lorem Ipsum as their default modelum sites</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 team1 ">
          <div class="photo">
            <div class="imageblock"> <img alt="#" src="image/team2.jpg" class="img-responsive"> </div>
            <div class="name"> <a href="#">IBRAHIM ISTALIK</a> </div>
            <h3>Founder and CEO</h3>
            <p>Page editors now use Lorem Ipsum as their default modelum sites</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 team1 ">
          <div class="photo">
            <div class="imageblock"> <img alt="#" src="image/team3.jpg" class="img-responsive"> </div>
            <div class="name"> <a href="#">IBRAHIM ISTALIK</a> </div>
            <h3>Founder and CEO</h3>
            <p>Page editors now use Lorem Ipsum as their default modelum sites</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 team1 ">
          <div class="photo">
            <div class="imageblock"> <img alt="#" src="image/team4.jpg" class="img-responsive"> </div>
            <div class="name"> <a href="#">IBRAHIM ISTALIK</a> </div>
            <h3>Founder and CEO</h3>
            <p>Page editors now use Lorem Ipsum as their default modelum sites</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection   
<!--end section--> 

@section('script')
   
@endsection