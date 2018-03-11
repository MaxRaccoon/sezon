@extends ('layouts.app')

@section('title')
    {{ strip_tags($keys['MetaPageTitle']) }}
@endsection

@section('head')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
@endsection

@section('body')
    <nav class="navbar sticky-top navbar-expand-lg">
        <a class="navbar-brand" href="/">Спорт клуб "СЕЗОН"</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                @foreach ($menu as $item)
                    @if ($item['url'] == "#programs")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                           id="programDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            {{ $item['title'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="programDropdown">
                            @foreach($programs as $program)
                                @if ($program['is_training'])
                                    @continue
                                @endif
                                <a class="dropdown-item" href="{{ $item['url'] }}"
                                   data-program-link="{{ $program['id'] }}"
                                >{{ $program['title'] }}</a>
                            @endforeach
                        </div>
                    </li>
                    @else
                    <li class="nav-item
                        @if ($loop->first)
                            active
                        @endif">
                        <a class="nav-link" href="{{ $item['url'] }}">
                            {{ $item['title'] }}
                            @if ($loop->first)
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
            <span class="navbar-text">
                {{ strip_tags($keys['ContactAddress']) }}.
                <strong>{{ strip_tags($keys['ContactPhone']) }}</strong>
            </span>
        </div>
    </nav>

    <header class="">
        <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($slides as $slide)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index  }}"
                        @if ($loop->first)
                        class="active"
                        @endif
                    ></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($slides as $slide)
                    <div class="carousel-item
                        @if ($loop->first)
                            active
                        @endif
                        ">
                        <img class="d-block w-100" src="{{ $slide['image'] }}"
                             alt="{{ $slide['title'] }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $slide['title'] }}</h3>
                            <p>{{ $slide['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Следующий</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Предыдущий</span>
                </a>
            </div>
        </div>
    </header>

    <div class="title-bg">
        <h1 class="text-center">{{ strip_tags($keys['H1']) }}</h1>
    </div>

    <div class="programs row d-none d-xl-flex">
        @foreach($topLink as $item)
        <div class="col-md-4 image">
            <img src="{{ $item['image'] }}" />
        </div>
        <div class="col-md-4 description">
            <h3><span class="orange">{{ $item['title_first_part'] }}</span> {{ $item['title_other'] }}</h3>
            {{--<div class="short">Продолжительность 55 минут</div>--}}
            <div class="info">
                {{ $item['description'] }}
            </div>
            <a href="{{ $item['link'] }}" class="btn btn-gray">{{ $item['link_title'] }}</a>
        </div>
        @endforeach
    </div>

    <div class="gallery-block d-none d-lg-block">
        <div id="gallery" style="display:none;">

            @foreach ($images as $image)
                <a href="#">
                    <img alt="{{ $image['title'] }}"
                         src="{{ $image['image_thumb_link'] }}"
                         data-image="{{ $image['image_link'] }}"
                         data-description="{{ $image['description'] }}"
                         style="display:none">
                </a>
            @endforeach

        </div>
    </div>

    <div class="info-block" id="about-us">
        <div class="container">
            <h2>{!! $keys['AboutTitle'] !!}</h2>
            <?php
                list ($short, $full) = explode("----", $keys['AboutDescription']);
            ?>
            {!! $short !!}
            <a class="btn btn-gray" onclick="showFullInfo()">Читать дальше</a>
            <p class="full">{!! $full !!}</p>
        </div>
    </div>

    <div class="container padded" id="trainers">

        <h3 class="text-center gray title">Тренерский состав</h3>

        <div class="trainers">
            @foreach($trainers as $trainer)
            <div data-trainer-link="{{ $trainer['id'] }}">
                <div class="img">
                    <img src="{{ $trainer['photo_link'] }}" class="" />
                </div>
                <div class="name">
                    <strong><span class="orange">{{ $trainer['name'] }}</span> {{ $trainer['last_name'] }}</strong>
                </div>
            </div>
            @endforeach
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="pricing" id="pricing">
        <div class="container">
            <h3 class="text-center title">{{ strip_tags($keys['PaymentH1']) }}</h3>

            <div class="info">
                {!! $keys['PaymentText'] !!}<br /><br />
                <span class="phone">{{ strip_tags($keys['PaymentPhone']) }}</span>
            </div>

        </div>
    </div>

    <div class="programs-list row" id="programs">
        <div class="menu-list col-md-3 d-none d-lg-block">
            @foreach($programs as $program)
                @if ($program['is_training'])
                    @continue
                @endif
            <div data-program-link="{{ $program['id'] }}"
                 @if ($loop->first)
                 class="active"
                @endif
                >{{ $program['title'] }}</div>
            @endforeach
        </div>
        <div class="program-info col-md-7">
            @foreach($programs as $program)
            <div data-program-index="{{ $program['id'] }}">
                <div class="photo d-none d-lg-block" id="program-photo-{{ $program['id'] }}"
                    data-gallery-init="0">
                    @foreach($program['photo'] as $photo)
                        <a href="#" title="{{ $program['title'] }}: фото №{{ $loop->iteration }}">
                            <img alt="{{ $program['title'] }}: фото №{{ $loop->iteration }}"
                                 src="{{ $photo['photo_thumb_link'] }}"
                                 data-image="{{ $photo['photo_link'] }}"
                                 style="display:none">
                        </a>
                    @endforeach
                </div>
                @if ($program['duration'] and $program['duration'] != "")
                <h4>Продолжительность {{ $program['duration'] }} минут</h4>
                @endif
                <h3 class="title">{{ $program['title'] }}</h3>
                {!! $program['description'] !!}
                <div class="clearfix"></div>
                <br />
                <div class="info">
                    @if($program['is_training'])
                        @foreach($program['trainers'] as $trainer)
                            <div class="trainer" data-trainer-link="{{ $trainer['id'] }}">
                                <span class="orange">{{ $trainer['name'] }}</span>
                                {{ $trainer['last_name'] }}
                            </div>
                        @endforeach
                    @else
                    <div class="trainer" data-trainer-link="{{ $program['trainer']['id'] }}">
                        <span class="orange">{{ $program['trainer']['name'] }}</span>
                        {{ $program['trainer']['last_name'] }}
                    </div>
                    @endif
                    @foreach($program['schedule'] as $day)
                    <div class="day" data-schedule-link="{{ $days[ $day['day_of_weak'] ] }}">
                        {{ $days[ $day['day_of_weak'] ] }}
                        <span class="orange">{{ $day['start_time'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            @foreach($trainers as $trainer)
            <div data-trainer-index="{{ $trainer['id'] }}">
                <h3>{{ $trainer['name'] }} {{ $trainer['last_name'] }}</h3>
                <div class="photo">
                    <img src="{{ $trainer['photo_link'] }}" />
                </div>
                {!! $trainer['description'] !!}
                <div class="info">
                    @foreach($trainer['programs'] as $program)
                        <div class="program" data-program-link="{{ $program['id'] }}"
                            data-training="{{ $program['is_training'] }}">
                            {{ $program['title'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div data-schedule-index="0">
                <h3>Расписание программ</h3>
                <div class="schedule-table">
                @foreach($schedule as $dayIndex => $daySchedule)
                    <div class="info">
                        <div class="day">{{ $days[ $dayIndex ] }}</div>
                    @foreach($daySchedule as $time => $programSchedule)
                            <div class="program" data-program-link="{{ $programSchedule['id'] }}">
                                <span class="orange">{{ $time }}</span> {{ $programSchedule['title'] }}
                            </div>
                    @endforeach
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-block d-md-none">
        <div id="gallery-m" style="display:none;">

            @foreach ($images as $image)
                <a href="#">
                    <img alt="{{ $image['title'] }}"
                         src="{{ $image['image_thumb_link'] }}"
                         data-image="{{ $image['image_link'] }}"
                         data-description="{{ $image['description'] }}"
                         style="display:none">
                </a>
            @endforeach

        </div>
    </div>

    <div class="row graybg nomarrgin footer" id="contact">
        <div class="col-md-6 info">
            <div class="row">
                <div class="col-md-3">
                    <strong class="company-name">СЕЗОН &copy; {{ date('Y') }}</strong>
                    <div class="social">
                        <a href="{{ $keys['InstagramLink'] }}"
                           target="_blank"><i class="fa fa-instagram"></i>
                        </a>
                        <a href="{{ $keys['VkLink'] }}"
                           target="_blank"><i class="fa fa-vk"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong>{!! $keys['MetaDescrition'] !!}</strong>
                    <br />
                    <p class="gray">{!! $keys['ContactAddress'] !!}</p>
                    <br />
                    <strong>Режим работы:</strong>
                    <p class="gray">
                       {!! $keys['Schedule'] !!}
                    </p>
                    <h4><i class="fa fa-phone" aria-hidden="true"></i> {{ strip_tags($keys['ContactPhone']) }}</h4>
                </div>
                <div class="col-md-5">
                    <strong>Новости</strong>

                    @foreach ($news as $one)
                        <br /><br />
                        <a href="#" onclick="showNews({{ $one->id }})">
                            <strong class="gray">{{ $one->title }}</strong>
                        </a>
                        <div data-news-content="{{ $one->id }}"
                             data-title="{{ $one->title }}" class="hide">
                            {!! $one->content !!}
                            <div class="photo" id="news-photo-{{ $one->id }}"
                                 data-gallery-init="0">
                                @foreach($one->photo()->where('deleted', 0)->get() as $image)
                                    <a href="#" title="{{ $one->title }}: фото №{{ $loop->iteration }}">
                                        <img alt="{{ $one->title }}: фото №{{ $loop->iteration }}"
                                             src="{{ $image->photo_thumb_link }}"
                                             data-image="{{ $image->photo_link  }}"
                                             style="display:none">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <br />
                        <i>{{ $one->getPublishDate()->format("d.m.Y") }}</i>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="yMap"></div>
        </div>
    </div>

    <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="newsModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

@endsection