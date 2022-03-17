@extends('layout')
@section('href')
/addproduct
@endsection
@section('item')
<span class="fs-5 py-1">+</span>
@endsection
@section('main')
<div class="container mt-3">
    <div class="row row-cols-4 gap-3 g-3">
        @foreach($reviews as $item)
        <div class="col rounded-3 py-2 px-3 bg-light shadow-sm h-cart">
            <a href="/detailed/{{$item->id}}" class="text-dark text-decoration-none">
                <div class="h-img-tovar text-center">
                    <img class="w-100 h-100 rounded-3" style="object-fit: cover;" src="/storage/folder/{{$item->foto}}" alt="...">
                </div>
                <div class="d-flex flex-column mt-3">
                    <span class="fw-bold fs-5">{{$item->price}}р</span>
                    <span class="small">{{$item->name}}</span>
                </div>
                <div class="d-flex text-warning">
                    @if($comment->where('reviews_id', $item->id)->sum('star') == 0)
                        <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 0.5)
                        <i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 1)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 1.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 2)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 2.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 3)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 3.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 4)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 4.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    @elseif($comment->where('reviews_id', $item->id)->sum('star')/$comment->where('reviews_id',$item->id)->count() <= 5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    @endif
                    <span class="text-muted ms-2">{{$comment->where('reviews_id',$item->id)->count()}}</span>
                </div>
            </a>
            <div class="d-flex gap-1 mt-2">
                <button class="btn btn-dark w-100" id="{{$item->id}}" onclick="cart(this.id)">В корзину</button>
                <input style="display: none;" type="number" class="form-control" id="input{{$item->id}}" placeholder="Количество" value="1">
                <button id="btn{{$item->id}}" onclick="ajax_start(this.id)" style="display: none;" class="btn btn-primary"><i class="bi bi-check-lg"></i></button>
                <button id="like{{$item->id}}" class="btn btn-like"><i class="bi bi-heart text-danger"></i></button>
            </div>
            @if(Auth::check())
                @if(auth()->user()->status == 1)
                <div class="btn-group dropstart btn-menu-cart">
                    <button type="button" class="btn px-1 py-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu drop-position">
                        <li><a href="/carousel/{{$item->id}}" class="dropdown-item" type="button">Карусель</a></li>
                        <li><a href="/edit/{{$item->id}}" class="dropdown-item" type="button">Редактировать</a></li>
                        <li><a href="delete_product/{{$item->id}}" class="dropdown-item" type="button">Удалить</a></li>
                    </ul>
                </div>
                @endif
            @endif
        </div>
        <script>
            function cart(id){
                document.getElementById(id).style = 'display:none;'
                document.getElementById('like'+id).style = 'display:none;'
                document.getElementById('input'+id).style = 'display:block;'
                document.getElementById('btn'+id).style = 'display:block;'
            }
            function ajax_start(id){
                id = id.replace(/[a-za-яё]/gi,'')
                var colvo = document.getElementById('input'+id).value
                $.ajax({
                url: `/basket/${id}/${colvo}`,
                method: 'get',
                dataType: 'html',
                success: function(data){
                    document.getElementById('like'+id).style = 'display:block;'
                    document.getElementById('input'+id).style = 'display:none;'
                    document.getElementById('btn'+id).style = 'display:none;'
                    document.getElementById(id).style = 'display:block;'
                    document.getElementById(id).innerHTML = 'Уже в корзине'
                    document.getElementById(id).disabled = true
                }
                });
            }
        </script>
        @endforeach
    </div>
</div>

@endsection