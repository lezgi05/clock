@extends('layout')
@section('main')
<div class="container w-50 my-5" style="padding-top: 75px; padding-bottom: 75px;">
  <main class="form-signin">
    <form action="/addcarousel/{{$reviews->id}}" method="post" enctype="multipart/form-data">
      @csrf
      <h1 class="h3 mb-3 fw-normal text-center">Добавить продукт</h1>

      <div class="form-floating mb-2">
        <input type="file" name="carousel" id="name">
        @if($errors -> has('carousel')) 
          <div class="text-danger">{{$errors -> first('carousel')}}</div>
        @endif
        <input type="text" name="car_id" class="d-none" value="{{$reviews->id}}">
      </div>

      <button name="go" id="go" class="w-100 btn btn-lg btn-dark" type="submit">Добавить</button>
    </form>
  </main>
</div>
@endsection