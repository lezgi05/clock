@extends('layout')
@section('main')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col d-flex flex-column bg-light rounded-3 shadow-sm pt-2 pb-1 px-3">
            <div href="/personal" class="text-decoration-none d-flex flex-column">
                <div class="d-flex">
                    <a class="rounded-pill a-avatar" data-bs-toggle="modal" data-bs-target="#exampleModalavatar">
                        @if($i == 0)
                            <img class="avatar rounded-pill" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                        @else
                            @if($details->avatar == '')
                                <img class="avatar rounded-pill" src="https://static.tildacdn.com/tild6361-3034-4333-b833-353964363837/pngwingcom_2.png" alt="...">
                            @else
                                <img class="avatar rounded-pill" src="/storage/avatar/{{auth()->user()->id}}/{{$details->avatar}}" alt="...">
                            @endif
                        @endif
                    </a>
                    <div class="item-circle rounded-pill d-flex align-items-center justify-content-center"><i class="bi bi-camera text-white fs-item-camera"></i></div>
                    <span class="fs-4 fw-bold text-dark my-auto">
                        @if(auth()->user()->name == '')
                            Не указано
                        @else
                            {{auth()->user()->surname}} {{auth()->user()->name}} {{auth()->user()->patronymic}}
                        @endif
                        <button class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModalname"><i class="bi bi-pencil-fill"></i></button>
                    </span>
                </div>
            </div>
            <div class="d-flex justify-content-between my-3">
                <div class="d-flex flex-column">
                    <span class="text-muted">Email</span>
                    <div class="d-flex">
                        <span>
                            @if($i == 0)
                                Не указано
                            @else 
                                @if($details->email == '')
                                    Не указано
                                @else
                                    {{$details->email}}
                                @endif
                            @endif
                        </span>
                        <button class="btn py-0"  data-bs-toggle="modal" data-bs-target="#exampleModalemail"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-muted">Телефон</span>
                    <div class="d-flex">
                        <span>{{auth()->user()->tel}}</span>
                        <button class="btn py-0"  data-bs-toggle="modal" data-bs-target="#exampleModaltel"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-muted">Дата рождения</span>
                    <div class="d-flex">
                        <span>
                            @if($i == 0)
                                Не указано
                            @else 
                                @if($details->day == '')
                                    Не указано
                                @else
                                    {{$details->day}}.{{$details->mounth}}.{{$details->year}}
                                @endif
                            @endif
                        </span>
                        <button class="btn py-0"  data-bs-toggle="modal" data-bs-target="#exampleModaldate"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="text-muted">Пол</span>
                    <div class="d-flex">
                        <span>
                            @if($i == 0)
                                Не указано
                            @else 
                                @if($details->gender == '')
                                    Не указано
                                @else
                                    {{$details->gender}}
                                @endif
                            @endif
                        </span>
                        <button class="btn py-0"  data-bs-toggle="modal" data-bs-target="#exampleModalgender"><i class="bi bi-pencil-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Добавить avatar -->
<div class="modal fade" id="exampleModalavatar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменить аватар</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addavatar/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" enctype="multipart/form-data" class="d-flex flex-column w-75 mx-auto">
                @csrf
                    <div class="d-flex flex-column mb-3">
                        <label class="text-muted mb-1">Добавьте фото *</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Добавить имя -->
<div class="modal fade" id="exampleModalname" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменение ФИО</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addname/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" class="d-flex flex-column w-75 mx-auto">
                @csrf
                    <div class="d-flex flex-column mb-2">
                        <label class="text-muted mb-1">Фамилия *</label>
                        <input type="text" name="surname" value="{{auth()->user()->surname}}" class="form-control">
                    </div>
                    <div class="d-flex flex-column mb-2">
                        <label class="text-muted mb-1">Имя *</label>
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <label class="text-muted mb-1">Отчество</label>
                        <input type="text" name="patronymic" value="{{auth()->user()->patronymic}}" class="form-control">
                    </div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Добавить email -->
<div class="modal fade" id="exampleModalemail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменение e-mail</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addemail/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" class="d-flex flex-column w-75 mx-auto">
                @csrf
                    <div class="d-flex flex-column mb-2">
                        <label class="text-muted mb-1">Введите e-mail *</label>
                        <input type="text" name="email" value="@if($i == 1){{$details->email}}@endif" class="form-control">
                    </div>
                    <div class="mb-3 text-muted">Все подписки на рассылки будут сохранены при изменении e-mail</div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Изменить телефон -->
<div class="modal fade" id="exampleModaltel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменение номера телефона</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addtel/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" class="d-flex flex-column w-75 mx-auto">
                @csrf
                    <div class="d-flex flex-column mb-2">
                        <label class="text-muted mb-1">Номер телефона *</label>
                        <input type="tel" data-tel-input name="tel" value="" class="form-control">
                    </div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Добавить дату -->
<div class="modal fade" id="exampleModaldate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменение номера телефона</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/adddate/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" class="d-flex flex-column w-75 mx-auto">
                @csrf
                <div class="form-floating mb-3">
                        <div class="row g-1">
                            <label class="text-muted form-label">Дата рождения</label>
                            <div class="col">
                                <select name="day" value="@if($i == 1){{$details->day}}@endif" class="form-select" aria-label="Default select example">
                                    <option disabled="" selected="">@if($i == 0) День @else @if($details->day == '') День @else {{$details->day}} @endif @endif</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <select name="mounth" value="@if($i == 1){{$details->mounth}}@endif" class="form-select" aria-label="Default select example">
                                    <option disabled="" selected="">@if($i == 0) Месяц @else @if($details->mounth == '') Месяц @else {{$details->mounth}} @endif @endif</option>
                                    <option value="01">Январь</option>
                                    <option value="02">Февраль</option>
                                    <option value="03">Март</option>
                                    <option value="04">Апрель</option>
                                    <option value="05">Май</option>
                                    <option value="06">Июнь</option>
                                    <option value="07">Июль</option>
                                    <option value="08">Август</option>
                                    <option value="09">Сентябрь</option>
                                    <option value="10">Октябрь</option>
                                    <option value="11">Ноябрь</option>
                                    <option value="12">Декабрь</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="year" value="@if($i == 1){{$details->year}}@endif" class="form-select" aria-label="Default select example">
                                    <option disabled="" selected="">@if($i == 0) Год @else @if($details->year == '') Год @else {{$details->year}} @endif @endif</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Изменить gender -->
<div class="modal fade" id="exampleModalgender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold ms-5 ps-2" id="exampleModalLabel">Изменение номера телефона</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addgender/@if($i == 0){{auth()->user()->id}}@else{{$details->id}}@endif" method="post" class="d-flex flex-column w-75 mx-auto">
                @csrf
                    <div class="d-flex flex-column mb-3">
                        <span class="text-muted mb-1">Пол</span>
                        <div class="d-flex">
                            <div class="form-check me-5 ms-2">
                                <input class="form-check-input fs-5" value="Мужской" type="radio" name="gender" id="flexRadioDefault1" @if($i == 1) @if($details->gender == 'Мужской') checked @endif @endif >
                                <label class="form-check-label mt-1" for="flexRadioDefault1">
                                    Мужской
                                </label>
                            </div>
                            <div class="form-check ms-2">
                                <input class="form-check-input fs-5" value="Женский" type="radio" name="gender" id="flexRadioDefault2" @if($i == 1) @if($details->gender == 'Женский') checked @endif @endif >
                                <label class="form-check-label mt-1" for="flexRadioDefault2">
                                    Женский
                                </label>ч
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <button class="btn btn-dark w-50 me-2">Сохранить</button>
                        <button type="button" class="btn btn-outline-dark w-50" data-bs-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection