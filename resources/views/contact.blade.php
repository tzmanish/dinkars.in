@extends('layouts/public')
@section('title', 'Contact')
@section('body')
<style>
  .iframe-container{
    position: relative;
    width: 100%;
    height: 80vh; /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
}
.iframe-container > *{
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}
</style>
<div class="iframe-container">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14716.497373526183!2d75.89972537852414!3d22.760766298198448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x68e4113cc4511fe5!2sRohit+Dinkar+Architects+%26+Dinkar+Associates!5e0!3m2!1sen!2sin!4v1549039481825" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

@endsection
@section('js')

@endsection