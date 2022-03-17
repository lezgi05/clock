@extends('layout')
@section('href')
/
@endsection
@section('item')
<span class="fs-5 py-1"><i class="bi bi-arrow-left"></i></span>
@endsection
@section('main')
<div class="container w-50 my-5" style="padding-top: 75px; padding-bottom: 75px;">
  <main class="form-signin">
    <form action="/addproduct" method="post" enctype="multipart/form-data">
      @csrf
      <h1 class="h3 mb-3 fw-normal text-center">Добавить продукт</h1>

      <div class="form-floating mb-2">
        <input type="file" name="foto" id="name">
        @if($errors -> has('foto')) 
          <div class="text-danger">{{$errors -> first('foto')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="name" id="text" class="form-control" placeholder="Название" value="{{old('name')}}">
        <label for="name">Название</label>
        @if($errors -> has('name')) 
          <div class="text-danger">{{$errors -> first('name')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="text" id="text" class="form-control" placeholder="Описание" value="{{old('text')}}">
        <label for="text">Описание</label>
        @if($errors -> has('text')) 
          <div class="text-danger">{{$errors -> first('text')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="color" id="text" class="form-control" placeholder="Цвет" value="{{old('color')}}">
        <label for="color">Цвет</label>
        @if($errors -> has('color')) 
          <div class="text-danger">{{$errors -> first('color')}}</div>
        @endif
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="price" id="text" class="form-control" placeholder="Цена" value="{{old('price')}}">
        <label for="price">Цена</label>
        @if($errors -> has('price')) 
          <div class="text-danger">{{$errors -> first('price')}}</div>
        @endif
      </div>

      <button name="go" id="go" class="w-100 btn btn-lg btn-dark" type="submit">Добавить</button>
    </form>
  </main>
</div>
@endsection