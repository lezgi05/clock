@extends('layout')
@section('main')
<div class="container w-50 my-5" style="padding-top: 75px; padding-bottom: 75px;">
  <main class="form-signin">
    <form action="/edit_product/{{$reviews->id}}" method="post" enctype="multipart/form-data">
      @csrf
      <h1 class="h3 mb-3 fw-normal text-center">Редактировать товар</h1>

      <div class="form-floating mb-2">
        <input type="file" name="foto" id="name">
        @if($errors -> has('foto')) 
          <div class="text-danger">{{$errors -> first('foto')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="name" id="text" class="form-control" placeholder="Название" value="{{$reviews->name}}">
        <label for="name">Название</label>
        @if($errors -> has('name')) 
          <div class="text-danger">{{$errors -> first('name')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="text" id="text" class="form-control" placeholder="Описание" value="{{$reviews->text}}">
        <label for="text">Описание</label>
        @if($errors -> has('text')) 
          <div class="text-danger">{{$errors -> first('text')}}</div>
        @endif
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="color" id="text" class="form-control" placeholder="Цвет" value="{{$reviews->color}}">
        <label for="color">Цвет</label>
        @if($errors -> has('color')) 
          <div class="text-danger">{{$errors -> first('color')}}</div>
        @endif
      </div>

      <div class="form-floating mb-3">
        <input type="text" name="price" id="text" class="form-control" placeholder="Цена" value="{{$reviews->price}}">
        <label for="price">Цена</label>
        @if($errors -> has('price')) 
          <div class="text-danger">{{$errors -> first('price')}}</div>
        @endif
      </div>

      <button name="go" id="go" class="w-100 btn btn-lg btn-dark" type="submit">Редактировать</button>
    </form>
  </main>
</div>
@endsection