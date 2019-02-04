@extends('layouts/public')
@section('title', 'Contact')
@section('body')
<div class="row" id="full-height">
  <div class="col-md-8 scrollbar-black bg-light" id="leftpane">
    <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14716.497373526183!2d75.89972537852414!3d22.760766298198448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x68e4113cc4511fe5!2sRohit+Dinkar+Architects+%26+Dinkar+Associates!5e0!3m2!1sen!2sin!4v1549039481825" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
  <div class="col-md-4 bg-yellow rightpane">
    <br>
    <h2>Feedback/Review/Quary</h2>
    <hr><br>
      <form id="feedbackform">
          <div class="form-group">
            <label for="InputEmail">Email address</label>
            <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="This will help us getting back to you">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" id="InputName" placeholder="Enter your Name">
          </div>
          <div class="form-group">
              <label for="InputReview">Feedback/Review/Quary about our services</label>
              <textarea class="form-control" id="InputReview"  placeholder="Your openion matters a lot to us" required></textarea>
          </div>
          <button type="submit" class="btn btn-danger btnpink">Submit</button>
          <span id="successindicator" class="txt-pink"></span>
        </form>
  </div>  
</div>
@endsection
@section('js')
$(function () {
  // Listen to submit event on the <form> itself!
  $('#feedbackform').submit(function (e) {

    // Prevent form submission which refreshes page
    e.preventDefault();

    // Serialize data
    var formData = $(this).serialize();

    $('#successindicator').html(" <i class='fas fa-check-circle'></i> Thank you, we will contact you if required");
  });
});
@endsection