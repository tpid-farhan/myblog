@extends('main')

@section('title','| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <h1>Contact</h1>
          <hr>
          <form action="">
              <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                  <label for="subject">Subject :</label>
                  <input type="text" name="subject" class="form-control">
              </div>
              <div class="form-group">
                  <label for="email">Message :</label>
                  <textarea name="message" id="message" class="form-control">Type your message here...</textarea>
              </div>
              <input type="submit" name="submit" class="btn btn-success" value="Send Message">
          </form>
        </div>
    </div>
@endsection
         
       