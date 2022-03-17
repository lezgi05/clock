@extends('layout')
@section('main')
<main class="form-signin w-50 mx-auto pt-5 mt-5">
  <form action="/reg" method="POST" class="w-75 d-flex flex-column mx-auto">
      @csrf
    <h1 class="h3 mb-3 fw-normal text-center">Регистрация</h1>

    <div class="form-floating mb-2 mt-1">
      <input type="tel" name="tel" data-tel-input class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Телефон</label>
      @error('tel')<div class="text-danger">{{$message}}</div>@enderror
    </div>
    <div class="form-floating mb-2">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Пароль</label>
      @error('password')<div class="text-danger">{{$message}}</div>@enderror
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Повторите пароль</label>
      @error('password_confirmation')<div class="text-danger">{{$message}}</div>@enderror
    </div>

    <button class="w-100 btn btn-lg btn-dark" type="submit">Зарегистрироваться</button>
  </form>
  <div class="text-center mt-2">Уже зарегистрированы? <a href="/sign_in" class="text-decoration-none text-dark">Войдите на сайт</a></div>
</main>
@endsection
