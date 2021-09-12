@extends('layouts.rentbike')
@section('title','Bike Listing')

@section('content')
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Bike Listing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="home">Home</a></li>
        <li>Bike Listing</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->




<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
  <div class="col-md-9 col-md-push-3">



@forelse ($BikeDetail as $key=>$data)
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img  src="uploads/{{$data->bikepic}} " class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="  bikedetail/{{$data->id}} ">{{$data->bikename}} </a></h5>
            <p class="list-price">Price Per Day: {{$data->bikeprice}} Php  </p>
            <ul>
            <!-- <li><i class="fa fa-user" aria-hidden="true"></i> {{$data->carseats}} seats</li> -->
              <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$data->bikemodel}} model</li>
            <!--  <li><i class="fa fa-car" aria-hidden="true">{{$data->posttype}} </i></li> -->
            </ul>
            <p class="list-city">City: {{$data->location}} </p>

            <a href="bikedetail/{{$data->id}} " class="btn">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>

        @empty
            no data found
        @endforelse

         </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your  Bike </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand">
                  <option>Select Type</option>
                  <option>Without Driver</option>
                </select>
              </div>

             
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Bikes</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-bicycle" aria-hidden="true"></i> Recently Listed Bikes</h5>
          </div>
          <div class="recent_addedcars">
            <ul>

            @forelse ($BikeDetail as $key=>$data)
              <li class="gray-bg">
                <div class="recent_post_img"> <a href="bikedetail/{{$data->id}}"><img src="uploads/{{$data->bikepic}}" alt="image"></a> </div>
                <div class="recent_post_title"> <a href="bikedetail/{{$data->id}}">{{$data->bikename}}</a>
                  <p class="widget_price">{{$data->bikeprice}}Pesos Per Day</p>
                </div>
              </li>
              @empty
            no data found
        @endforelse

             
              
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

@endsection