@extends('layout')
@section('main')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col d-flex bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="/personal" class="text-decoration-none d-flex flex-column w-75">
                <div class="d-flex">
                    @if($i == 0)
                        <img class="avatar rounded-pill" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                    @else
                        @if($details->avatar == '')
                            <img class="avatar rounded-pill" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                        @else
                            <img class="avatar rounded-pill" src="/storage/avatar/{{auth()->user()->id}}/{{$details->avatar}}" alt="...">
                        @endif
                    @endif
                    <span class="fs-4 fw-bold text-dark ms-3 my-auto">
                        @if(auth()->user()->name == '')
                            Не указано
                        @else
                            {{auth()->user()->surname}} {{auth()->user()->name}} {{auth()->user()->patronymic}}
                        @endif
                    </span>
                </div>
                <div class="mt-2 mb-1 text-muted">Телефон <span class="text-dark">{{auth()->user()->tel}}</span></div>
            </a>
            <div class="d-flex flex-column w-25">
                <button class="btn btn-none ms-auto"><i class="bi bi-bell fs-5"></i></button>
                <a href="/exit" class="ms-auto mt-auto text-decoration-none text-dark">Выйти</a>
            </div>
        </div>
    </div>
    <div class="row mt-3 gap-3">
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="#" class="text-decoration-none d-flex flex-column w-100">
                <div class="d-flex">
                    <div class="d-flex justify-content-center border border-3 rounded-pill w-pill"><i class="bi bi-box-seam text-dark fs-5 h-75 my-auto"></i></div>
                    <span class="fs-5 fw-bold text-dark ms-3 my-auto">Доставки</span>
                </div>
                <div class="mt-2 mb-1 text-muted">Ближайшая <span class="text-dark">не ожидается    </span></div>
            </a>
        </div>
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="#" class="text-decoration-none d-flex flex-column w-100">
                <div class="d-flex">
                    <div class="d-flex justify-content-center border border-3 rounded-pill w-pill"><span class="text-dark fs-5 h-75 my-auto">7%</span></div>
                    <span class="fs-5 fw-bold text-dark ms-3 my-auto">Скидка покупателя</span>
                </div>
                <div class="mt-2 mb-1 text-muted">Сумма выкупа <span class="text-dark fw-bold">0р</span></div>
            </a>
        </div>
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="#" class="text-decoration-none d-flex flex-column w-100">
                <div class="d-flex">
                    <div class="d-flex justify-content-center border border-3 rounded-pill w-pill"><i class="bi bi-bag-check text-dark fs-5 h-75 my-auto"></i></div>
                    <span class="fs-5 fw-bold text-dark ms-3 my-auto">Покупки</span>
                </div>
                <div class="mt-2 mb-1 text-muted">0 товаров</div>
            </a>
        </div>
    </div>
    <div class="row mt-3 gap-3">
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="#" class="text-decoration-none d-flex flex-column w-100 h-75">
                <span class="fs-5 fw-bold text-dark">Финансы и электронные чеки</span>
            </a>
            <div class="d-flex align-items-end h-25 pb-2">
                <a href="#"  class="text-decoration-none text-dark badge rounded-pill bg-mut me-2 py-2 px-3">История покупок</a>
                <a href="#"  class="text-decoration-none text-dark badge rounded-pill bg-mut me-2 py-2 px-3">История операций</a>
                <a href="#"  class="text-decoration-none text-dark badge rounded-pill bg-mut py-2 px-3">Электронные чеки</a>
            </div>
        </div>
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <a href="#" class="text-decoration-none d-flex flex-column w-100">
                <span class="fs-5 fw-bold text-dark">Избранное</span>
                <div class="d-flex flex-column mt-2 mb-1 text-muted"><span>Здесь появятся товары, отмеченные как понравившиеся значком <i class="bi bi-heart text-danger"></i></span><span>Вы также можете добавлять товары которых нет в наличии. Если они вновь поступят в продажу, эта информация отобразится в данном разделе</span></div>
            </a>
        </div>
    </div>
</div>
@endsection