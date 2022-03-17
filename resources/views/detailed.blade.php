@extends('layout')
@section('main')
<div class="container mt-3 mb-5 pb-3">
    <div class="d-flex">
        <div id="carouselExampleControls" class="carousel slide mt-max" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#" class="a-carousel">
                        <img src="/storage/folder/{{$reviews->foto}}" class="img-carousel" alt="...">
                    </a>
                </div>
                @if($icar == 0)
                @else
                @foreach($carousel as $car)
                <div class="carousel-item">
                    <a href="#" class="a-carousel">
                        <img style="width: 200px; height: 200px; object-fit:cover;"  src="/storage/carousel/{{$car->carousel}}" class="img-carousel" alt="...">
                    </a>
                </div>
                @endforeach
                @endif
                <button class="carousel-control-prev h-25 my-auto" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next h-25 my-auto" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="d-flex flex-column ms-3">
            <h1 class="mt-2">{{$reviews->name}}</h1>
            <span class="fw-bold fs-3">{{$reviews->price}}р</span>
            <span class="mt-2 fs-5 fw-custom">О товаре:</span>
            <div>{{$reviews->text}}</div>
            <a href="#reviews" class="text-decoration-none text-warning d-flex mt-2">
                <div>
                    @if($estimation == 0)
                        <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 0.5)
                        <i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 1)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 1.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 2)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 2.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 3)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 3.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 4)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    @elseif($estimation <= 4.5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    @elseif($estimation <= 5)
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    @endif
                </div>
                <span class="ms-1 text-dark">{{$i}} отзывов</span>
            </a>
            <div class="d-flex mt-1 mb-2">
                <span class="text-muted me-2">Артикул:</span>
                <span>2428564</span>
                <span class="text-muted ms-3">Купили более 10 раз</span>
            </div>
            <div class="d-flex mt-auto">
                <button class="btn btn-dark w-75 me-2">В корзину</button>
                <button class="btn btn-like"><i class="bi bi-heart text-danger"></i></button>
            </div>
        </div>  
    </div>
    <div class="row mt-4 gap-3">
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <div class="d-flex flex-column w-100 h-75">
                <span class="fs-5 fw-bold text-dark">Характеристики</span>
                <div class="d-flex flex-column mt-1">
                    <div class="d-flex">
                        <span class="text-muted me-2">Тип:</span>
                        <span>Часы наручные мужские, кварцевый</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Водозащита:</span>
                        <span>WR100 (10 атм)</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Страна:</span>
                        <span>Япония</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Гарантия производителя:</span>
                        <span>2 года</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Бренд:</span>
                        <span>OMEGA</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Коллекция:</span>
                        <span>Sporty</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Материал корпуса:</span>
                        <span>Нержавеющая сталь</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Материал браслета/ремешка:</span>
                        <span>Нержавеющая сталь</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Стекло:</span>
                        <span>Минеральное</span>
                    </div>
                    <div class="d-flex">
                        <span class="text-muted me-2">Диаметр корпуса:</span>
                        <span>46мм</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <div class="d-flex flex-column w-100">
                <a href="#" class="d-flex text-decoration-none">
                    <img class="avatar-seller" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                    <span class="fs-5 fw-bold text-dark ms-3 my-auto">Магомедов Рамазан Хизриевич</span>
                </a>
                <div class="d-flex flex-column mt-3">
                    <div class="d-flex">
                        <div class="d-flex flex-column text-dark w-50 me-4">
                            <div class="d-flex">
                                <i class="bi bi-star-fill text-warning me-2"></i>
                                <span class="fw-custom">4.6/5</span>
                            </div>
                            <div>рейтинг товаров</div>
                        </div>
                        <div class="d-flex flex-column text-dark w-50">
                            <div class="d-flex">
                                <i class="bi bi-chat-left me-2"></i>
                                <span class="fw-custom">11 345</span>
                            </div>
                            <div>отзывов на товары</div>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="d-flex flex-column text-dark w-50 me-4">
                            <div class="d-flex">
                                <i class="bi bi-shop-window me-2"></i>
                                <span class="fw-custom">3 года и 10 мес</span>
                            </div>
                            <div>продает на Маркете</div>
                        </div>
                        <div class="d-flex flex-column text-dark w-50">
                            <div class="d-flex flex-column text-dark">
                                <div class="d-flex">
                                    <i class="bi bi-clock me-2"></i>
                                    <span class="fw-custom">100%</span>
                                </div>
                                <div>доставка вовремя</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-dark mt-3">
                        <div class="d-flex">
                            <i class="bi bi-card-checklist me-2"></i>
                            <span class="fw-custom">137 390</span>
                        </div>
                        <div>проданных товаров</div>
                    </div>
                    <a href="#" class="text-decoration-none text-muted mt-1">Перейти в магазин продавца</a>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mt-5 fw-bold">Прочие товары</h1>
    <div class="row row-cols-4 gap-3 scroll-none">
        @foreach($all as $item)
            @if($item->id != $id)
            <div class="col rounded-3 py-2 px-3 bg-light shadow-sm" style="height: 300px;">
                <a href="/detailed/{{$item->id}}" class="text-dark text-decoration-none">
                    <div class="h-75 text-center">
                        <img class="w-100 h-100 rounded-3" style="object-fit: cover;" src="/storage/folder/{{$item->foto}}" alt="...">
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <span class="fw-bold fs-5">{{$item->price}}р</span>
                        <span class="small">{{$item->name}}</span>
                    </div>
                </a>
            </div>
            @endif
        @endforeach
    </div>
    <div id="reviews" class="d-flex">
        <h1 class="fw-bold">Отзывы</h1>
        <span class="my-auto ms-2 fs-5">{{$i}}</span>
        <a href="/addreviews/{{$reviews->id}}" class="btn btn-dark h-25 mt-2 ms-auto w-25">Написать отзыв</a>
    </div>
    <div class="d-flex mt-1">
        <span class="text-muted me-3">Сортировать по:</span>
        <button class="btn py-0 me-2">Дате <i class="bi bi-arrow-down-short"></i></button>
        <button class="btn py-0 me-2">Оценке</button>
        <button class="btn py-0">Полезности</button>
        <a class="text-muted ms-auto a-avatar" data-bs-toggle="modal" data-bs-target="#exampleModalreviews">Правила оформления отзывов</a>
    </div>
    @if($i == 0)
    @else
    <div class="d-flex flex-column mt-2">
       @foreach($comment as $comm) 
        <div class="w-100 bg-light shadow-sm rounded-3 mt-3">
            <div class="d-flex">
                @if($comm->avatar == '')
                    <img class="comm-avatar rounded-pill ms-3 mt-3" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                @else
                    <img class="comm-avatar rounded-pill ms-3 mt-3" src="/storage/avatar/{{$comm->id_avatar}}/{{$comm->avatar}}" alt="...">
                @endif
                <div class="d-flex flex-column ms-4 mt-1">
                    @if($comm->name == '')
                        <div class="d-flex mt-3">
                            <h5 class="fw-bold">Не указано</h5>
                        </div>
                    @else
                        <div class="d-flex mt-2">
                            <h5 class="fw-bold me-2">{{$comm->surname}}</h5>
                            <h5 class="fw-bold">{{$comm->name}}</h5>
                        </div>
                    @endif
                    <div>
                    @for($i = 1; $i<=$comm->star; $i++)
                        <i class="bi bi-star-fill text-warning"></i>
                    @endfor
                    @if($comm->star == 1)
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                    @elseif($comm->star == 2)
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                    @elseif($comm->star == 3)
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                    @elseif($comm->star == 4)
                        <i class="bi bi-star text-warning"></i>
                    @endif
                    </div>
                    <div class="mb-2">{{$comm->text}}</div>
                </div>
                <div class="ms-auto me-3 mt-1 small">
                    @if(substr($comm->created_at, 0, 10) == date("Y-m-d"))
                        Сегодня, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 10) == date("Y-m-").$day-1)
                        Вчера, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-01')
                        {{substr($comm->created_at, 8, 3)}} января, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-02')
                        {{substr($comm->created_at, 8, 3)}} февраля, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-03')
                        {{substr($comm->created_at, 8, 3)}} марта, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-04')
                        {{substr($comm->created_at, 8, 3)}} апреля, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-05')
                        {{substr($comm->created_at, 8, 3)}} мая, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-06')
                        {{substr($comm->created_at, 8, 3)}} июня, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-07')
                        {{substr($comm->created_at, 8, 3)}} июля, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-08')
                        {{substr($comm->created_at, 8, 3)}} августа, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-09')
                        {{substr($comm->created_at, 8, 3)}} сентября, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-10')
                        {{substr($comm->created_at, 8, 3)}} октября, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-11')
                        {{substr($comm->created_at, 8, 3)}} ноября, {{substr($comm->created_at, 10, 6)}}
                    @elseif(substr($comm->created_at, 0, 7) == '2022-12')
                        {{substr($comm->created_at, 8, 3)}} декабря, {{substr($comm->created_at, 10, 6)}}
                    @endif   
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>


<!-- Правила оформления отзывов и вопросов -->
<div class="modal fade" id="exampleModalreviews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h4 class="modal-title fw-bold" id="exampleModalLabel">Правила оформления отзывов</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0">
        <div class="text-muted mb-2">В отзывах должна содержаться информация только о товаре.</div>
        <div class="text-muted">Отзывы можно оставить только на заказанный и полученный покупателем товар.
        К одному товару покупатель может оставить не более одного отзыва.
        К отзывам можно прикрепить до 5 фотографий. Товар на фото должен быть хорошо виден. </div>
        <div class="mt-3">К публикации не допускаются следующие отзывы и вопросы:</div>
        <div class="mt-2"><i class="bi bi-dash-lg me-1"></i> Указывающие на покупку данного товара в других магазинах</div>
        <div class="mt-1"><i class="bi bi-dash-lg me-1"></i> Содержащие любые контактные данные (номера телефонов, адреса, email, ссылки на сторонние сайты)</div>
        <div class="mt-1"><i class="bi bi-dash-lg me-1"></i> С ненормативной лексикой, оскорбляющие достоинство других покупателей или магазина</div>
        <div class="mt-1"><i class="bi bi-dash-lg me-1"></i> С обилием символов в верхнем регистре (заглавных букв)</div>
        <div class="text-muted mt-3">Мы оставляем за собой право редактировать или не публиковать отзыв и вопрос, который не соответствует установленным правилам!</div>
      </div>
    </div>
  </div>
</div>
@endsection