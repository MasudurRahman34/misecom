@extends('frontend.layouts.shop')
<!--start section -->
@section('title')
<title>App</title>    
@endsection
@section('breadcrumb')
<ul class="breadcrumb">
  <li><a href="index.html"><i class="fa fa-home"></i></a></li>
  <li><a href="contact.html">Contact Us</a></li>
</ul>
@endsection

@section('shop-content')
    <div class="row">
 
      <div class="col-md-8" id="content">
        <h1>Contact Us</h1>
        <h3>Our Location</h3>
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4 left">
                <address>
                <strong> Store Name: </strong>Focus privated limited <br>
                <br>
                <strong>Address:</strong>
                <div class="address"> Warehouse & Offices 12345 Street name,California</div>
                <br>
                <strong>Country:</strong> USA <br>
                <br>
                <strong>Phone: </strong>+ 0987-654-321
                </address>
              </div>
              <div class="col-sm-8 rigt">
                <div class="map"> 
                  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                  <div style="overflow:hidden;height:200px;width:100%;">
                    <div id="gmap_canvas" style="height:200px;width:600px;"></div>
                    <style>
  #gmap_canvas img{max-width:none!important;background:none!important}
  </style>
                    <a class="google-map-code" href="http://www.pureblack.de/google-maps/" id="get-map-data">pureblack.de</a></div>
                  <script type="text/javascript"> function init_map(){var myOptions = {zoom:14, scrollwheel:false,center:new google.maps.LatLng(36.778261,-119.41793239999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(36.778261, -119.41793239999998)});infowindow = new google.maps.InfoWindow({content:"<b>Focus privated limited</b><br/>Warehouse &amp; Offices 12345<br/> California " });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="#">
          <fieldset>
            <h3>Contact Form</h3>
            <div class="form-group required">
              <label for="input-name" class="col-sm-2 control-label">Your Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-name" value="" name="name">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-email" class="col-sm-2 control-label">E-Mail Address</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="input-email" value="" name="email">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-enquiry" class="col-sm-2 control-label">Enquiry</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="input-enquiry" rows="10" name="enquiry"></textarea>
              </div>
            </div>
          </fieldset>
          <div class="buttons">
            <div class="pull-right">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

@endsection   
<!--end section--> 

@section('script')
   
@endsection