@extends('layouts/public') 
@section('title', 'Home') 
@section('body')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/175711/spring.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>District Mobility Coordinator</h5>
        <p>Est voluptas officia exercitationem minus rerum ut commodi. Tempore velit nobis sed laborum voluptatibus hic illum. Deserunt molestias optio porro aut quo dolor.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/175711/winter.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>District Mobility Coordinator</h5>
        <p>Est voluptas officia exercitationem minus rerum ut commodi. Tempore velit nobis sed laborum voluptatibus hic illum. Deserunt molestias optio porro aut quo dolor.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/175711/spring.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>District Mobility Coordinator</h5>
        <p>Est voluptas officia exercitationem minus rerum ut commodi. Tempore velit nobis sed laborum voluptatibus hic illum. Deserunt molestias optio porro aut quo dolor.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
@section('js')
@endsection