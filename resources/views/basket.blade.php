@extends('layout')
@section('main')
<div class="container-fluid">
    <div class="d-flex gap-3">
        <div class="bg-light rounded-3 shadow-sm mt-4 pt-2 pb-3 px-4 w-65 h-100">
            <h3 class="fw-custom mb-0">Корзина</h3>
            <div class="row">
                @foreach($cart as $item)
                    <div class="col d-flex mt-3">
                        <img class="basket_img_tovar rounded-3" src="/storage/folder/{{$products->find($item['tovar'])->foto}}" alt="...">
                        <div class="d-flex flex-column ms-3">
                            <span class="mt-auto fs-5">{{$products->find($item['tovar'])->name}}</span>
                            <span class="mb-1 text-muted">Магомедов Рамазан <i class="bi bi-info-circle"></i></span>
                        </div>
                        <div class="d-flex flex-column ms-auto">
                            <span class="fw-bold fs-5 mt-2 ms-auto">{{$products->find($item['tovar'])->price}} р</span>
                            <div class="d-flex align-items-center ms-auto">
                                <button class="btn py-1 px-1"><i class="bi bi-dash"></i></button>
                                <span class="mx-1">{{$item['colvo']}}</span>
                                <button class="btn py-1 px-1"><i class="bi bi-plus"></i></button>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-link">В избранное</a>
                                <a href="#" class="text-link">Удалить</a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            </div>
        </div>
        <div class="bg-light rounded-3 shadow-sm mt-4 pt-2 pb-3 px-4 w-35 h-100">
            <div class="d-flex">
                <h3 class="fw-custom">Итого</h3>
                <span class="fw-bold fs-4 ms-auto">1 999р</span>
            </div>
            <div class="d-flex mt-1">
                <span class="text-muted">Товары, 1шт</span>
                <span class="ms-auto text-muted">1 999р</span>
            </div>
            <div class="d-flex small mt-3">
                <span class="fw-custom me-2">Доставка:</span>
                <a href="#" class="text-link">Выбрать адрес доставки</a>
            </div>
            <button class="btn btn-dark mt-3 w-100">Заказать</button>
            <div class="d-flex mt-2">
                <i class="bi bi-check-lg me-2"></i>
                <div class="small text-muted">
                    Согласен с условиями <a href="#" class="text-dark text-decoration-none">Правил пользования торговой площадкой</a> и <a href="#" class="text-dark text-decoration-none">правилами возврата</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection