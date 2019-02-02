@extends('layouts/public') 
@section('title', 'Home') 
@section('body')
<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExample" data-slide-to="1"></li>
      <li data-target="#carouselExample" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="2000">
        <img src="http://personal.psu.edu/xqz5228/jpg.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Human Response Orchestrator</h5>
            <p>Ut ut sit rerum iure consequatur. Facere totam deleniti quas consequatur maiores repellat alias maiores nostrum. Ducimus qui modi corrupti omnis velit doloremque fugit. Est reprehenderit hic perspiciatis nisi commodi debitis ea. Dicta molestiae quo esse reiciendis ut laborum.</p>
          </div>
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Pearl-breasted_Swallow_by_CraigAdam.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Lead Implementation Designer</h5>
            <p>Id fugit nihil exercitationem rerum autem error ducimus. Eum et molestias itaque in beatae. Aliquid at ut quod quo vel harum. Dignissimos sint ipsam. Eos provident reiciendis. Rerum aperiam sunt.</p>
          </div>
      </div>
      <div class="carousel-item" data-interval="2000">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6q3txLJDUEFEjmzX8otQINl0xwQtE6Hd2jbJh87xhpu2jA9l6Aw" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Chief Communications Engineer</h5>
            <p>Qui nihil eveniet sed. Impedit placeat quo voluptas. Aut dolores commodi ab dolorum. Sapiente rem sapiente et cumque. Dolor perferendis necessitatibus aut est tenetur quisquam nihil maxime vero.</p>
          </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endsection
@section('js')
@endsection