@extends('layout')
@section('main')
<div class="container w-50 my-5" style="padding-top: 75px; padding-bottom: 75px;">
  <main class="form-signin">
    <form action="/addcomment/{{$reviews->id}}" method="post">
      @csrf
      <h1 class="h3 mb-3 fw-normal text-center">Добавить комментарий</h1>

      <input type="hidden" name="user_id" value="@if($i == 1){{$details->id}}@endif">

      <input type="hidden" name="reviews_id" value="{{$reviews->id}}">
      
      <div class="d-flex mb-1">
        <input type="radio" class="btn-check" name="star" id="one_star" value="1" autocomplete="off" checked>
        <label class="btn" style="outline: none; box-shadow: none;" for="one_star"><i id="one_item_star" class="bi bi-star text-warning"></i></label>

        <input type="radio" class="btn-check" name="star" id="two_star" value="2" autocomplete="off">
        <label class="btn" style="outline: none; box-shadow: none;" for="two_star"><i id="two_item_star" class="bi bi-star text-warning"></i></label>

        <input type="radio" class="btn-check" name="star" id="three_star" value="3" autocomplete="off">
        <label class="btn" style="outline: none; box-shadow: none;" for="three_star"><i id="three_item_star" class="bi bi-star text-warning"></i></label>

        <input type="radio" class="btn-check" name="star" id="four_star" value="4" autocomplete="off">
        <label class="btn" style="outline: none; box-shadow: none;" for="four_star"><i id="four_item_star" class="bi bi-star text-warning"></i></label>

        <input type="radio" class="btn-check" name="star" id="five_star" value="5" autocomplete="off">
        <label class="btn" style="outline: none; box-shadow: none;" for="five_star"><i id="five_item_star" class="bi bi-star text-warning"></i></label>
      </div>

      <div class="form-floating mb-2">
        <input type="text" name="text" id="text" class="form-control" placeholder="Комментарий">
        <label for="text">Комментарий</label>
        @if($errors -> has('text')) 
          <div class="text-danger">{{$errors -> first('text')}}</div>
        @endif
      </div>

      <button name="submit" id="submit" class="w-100 btn btn-lg btn-dark" type="submit">Добавить</button>
    </form>
  </main>
</div>

<script>
  one_star.onclick = function() {
    one_item_star.classList.remove('bi-star')
    one_item_star.classList.add('bi-star-fill')
    two_item_star.classList.add('bi-star')
    two_item_star.classList.remove('bi-star-fill')
    three_item_star.classList.add('bi-star')
    three_item_star.classList.remove('bi-star-fill')
    four_item_star.classList.add('bi-star')
    four_item_star.classList.remove('bi-star-fill')
    five_item_star.classList.add('bi-star')
    five_item_star.classList.remove('bi-star-fill')
  }
  two_star.onclick = function() {
    one_item_star.classList.remove('bi-star')
    one_item_star.classList.add('bi-star-fill')
    two_item_star.classList.remove('bi-star')
    two_item_star.classList.add('bi-star-fill')
    three_item_star.classList.add('bi-star')
    three_item_star.classList.remove('bi-star-fill')
    four_item_star.classList.add('bi-star')
    four_item_star.classList.remove('bi-star-fill')
    five_item_star.classList.add('bi-star')
    five_item_star.classList.remove('bi-star-fill')
  }
  three_star.onclick = function() {
    one_item_star.classList.remove('bi-star')
    one_item_star.classList.add('bi-star-fill')
    two_item_star.classList.remove('bi-star')
    two_item_star.classList.add('bi-star-fill')
    three_item_star.classList.remove('bi-star')
    three_item_star.classList.add('bi-star-fill')
    four_item_star.classList.add('bi-star')
    four_item_star.classList.remove('bi-star-fill')
    five_item_star.classList.add('bi-star')
    five_item_star.classList.remove('bi-star-fill')
  }
  four_star.onclick = function() {
    one_item_star.classList.remove('bi-star')
    one_item_star.classList.add('bi-star-fill')
    two_item_star.classList.remove('bi-star')
    two_item_star.classList.add('bi-star-fill')
    three_item_star.classList.remove('bi-star')
    three_item_star.classList.add('bi-star-fill')
    four_item_star.classList.remove('bi-star')
    four_item_star.classList.add('bi-star-fill')
    five_item_star.classList.add('bi-star')
    five_item_star.classList.remove('bi-star-fill')
  }
  five_star.onclick = function() {
    one_item_star.classList.remove('bi-star')
    one_item_star.classList.add('bi-star-fill')
    two_item_star.classList.remove('bi-star')
    two_item_star.classList.add('bi-star-fill')
    three_item_star.classList.remove('bi-star')
    three_item_star.classList.add('bi-star-fill')
    four_item_star.classList.remove('bi-star')
    four_item_star.classList.add('bi-star-fill')
    five_item_star.classList.remove('bi-star')
    five_item_star.classList.add('bi-star-fill')
  }
</script>
@endsection