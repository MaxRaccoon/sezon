<?php $__env->startSection('title'); ?>
    <?php echo e(strip_tags($keys['MetaPageTitle'])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Спорт клуб "СЕЗОН"</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item
                        <?php if($loop->first): ?>
                            active
                        <?php endif; ?>">
                        <a class="nav-link" href="#<?php echo e($item['url']); ?>">
                            <?php echo e($item['title']); ?>

                            <?php if($loop->first): ?>
                                <span class="sr-only">(current)</span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <span class="navbar-text">
                <?php echo e(strip_tags($keys['ContactAddress'])); ?>.
                <strong><?php echo e(strip_tags($keys['ContactPhone'])); ?></strong>
            </span>
        </div>
    </nav>

    <header>
        <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($loop->index); ?>"
                        <?php if($loop->first): ?>
                        class="active"
                        <?php endif; ?>
                    ></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <div class="carousel-inner">
                    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item
                        <?php if($loop->first): ?>
                            active
                        <?php endif; ?>
                        ">
                        <img class="d-block w-100" src="<?php echo e($slide['image']); ?>"
                             alt="<?php echo e($slide['title']); ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h3><?php echo e($slide['title']); ?></h3>
                            <p><?php echo e($slide['description']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <h1 class="text-center"><?php echo e(strip_tags($keys['H1'])); ?></h1>
    </div>

    <div class="programs row">
        <?php $__currentLoopData = $topLink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 image">
            <img src="<?php echo e($item['image']); ?>" />
        </div>
        <div class="col-md-4 description">
            <h3><span class="orange"><?php echo e($item['title_first_part']); ?></span> <?php echo e($item['title_other']); ?></h3>
            
            <div class="info">
                <?php echo e($item['description']); ?>

            </div>
            <a href="<?php echo e($item['link']); ?>" class="btn btn-gray"><?php echo e($item['link_title']); ?></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="gallery-block">
        <div id="gallery" style="display:none;">

            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#">
                    <img alt="Lemon Slice"
                         src="<?php echo e($image); ?>"
                         data-image=""<?php echo e($image); ?>"
                         data-description="This is a Lemon Slice"
                         style="display:none">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <div class="info-block" id="about-us">
        <div class="container">
            <h2><?php echo $keys['AboutTitle']; ?></h2>
            <?php
                list ($short, $full) = explode("----", $keys['AboutDescription']);
            ?>
            <?php echo $short; ?>

            <a class="btn btn-gray" onclick="showFullInfo()">Читать дальше</a>
            <p class="full"><?php echo $full; ?></p>
        </div>
    </div>

    <div class="container padded" id="trainers">

        <h3 class="text-center gray title">Тренерский состав</h3>

        <div class="trainers">
            <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-trainer-link="<?php echo e($trainer['id']); ?>">
                <div class="img">
                    <img src="<?php echo e($trainer['photo_link']); ?>" class="" />
                </div>
                <div class="name">
                    <strong><span class="orange"><?php echo e($trainer['name']); ?></span> <?php echo e($trainer['last_name']); ?></strong>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="pricing" id="pricing">
        <div class="container">
            <h3 class="text-center title"><?php echo e(strip_tags($keys['PaymentH1'])); ?></h3>

            <div class="info">
                <?php echo $keys['PaymentText']; ?><br /><br />
                <span class="phone"><?php echo e(strip_tags($keys['PaymentPhone'])); ?></span>
            </div>

        </div>
    </div>

    <div class="programs-list row" id="programs">
        <div class="menu-list col-md-3">
            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-program-link="<?php echo e($program['id']); ?>"
                 <?php if($loop->first): ?>
                 class="active"
                <?php endif; ?>
                ><?php echo e($program['title']); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="program-info col-md-7">
            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-program-index="<?php echo e($program['id']); ?>">
                <h4>Продолжительность <?php echo e($program['duration']); ?> минут</h4>
                <h3 class="title"><?php echo e($program['title']); ?></h3>
                <?php echo $program['description']; ?>

                <div class="clearfix"></div>
                <br />
                <div class="info">
                    <div class="trainer" data-trainer-link="<?php echo e($program['trainer']['id']); ?>">
                        <span class="orange"><?php echo e($program['trainer']['name']); ?></span>
                        <?php echo e($program['trainer']['last_name']); ?>

                    </div>
                    <?php $__currentLoopData = $program['schedule']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="day" data-schedule-link="<?php echo e($days[ $day['day_of_weak'] ]); ?>">
                        <?php echo e($days[ $day['day_of_weak'] ]); ?>

                        <span class="orange"><?php echo e($day['start_time']); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-trainer-index="<?php echo e($trainer['id']); ?>">
                <h3><?php echo e($trainer['name']); ?> <?php echo e($trainer['last_name']); ?></h3>
                <div class="photo">
                    <img src="<?php echo e($trainer['photo_link']); ?>" />
                </div>
                <?php echo $trainer['description']; ?>

                <div class="info">
                    <?php $__currentLoopData = $trainer['programs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="program" data-program-link="<?php echo e($program['id']); ?>">
                            <?php echo e($program['title']); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div data-schedule-index="0">
                <h3>Расписание программ</h3>
                <div class="schedule-table">
                <?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayIndex => $daySchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="info">
                        <div class="day"><?php echo e($days[ $dayIndex ]); ?></div>
                    <?php $__currentLoopData = $daySchedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time => $programSchedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="program" data-program-link="<?php echo e($programSchedule['id']); ?>">
                                <span class="orange"><?php echo e($time); ?></span> <?php echo e($programSchedule['title']); ?>

                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row graybg nomarrgin footer" id="contact">
        <div class="col-md-6 info">
            <div class="row">
                <div class="col-md-3">
                    <strong class="company-name">СЕЗОН &copy; 2017</strong>
                </div>
                <div class="col-md-4">
                    <strong>Спортивный клуб "Сезон"</strong>
                    <br /><br />
                    <p class="gray">Иркутск, ул. Свердлова, 36, ТЦ «Сезон», 3 этаж</p>
                    <strong>Режим работы:</strong>
                    <p class="gray">
                        Понедельник - Суббота, с 8:00 до 21:00
                    </p>
                    <h4><i class="fa fa-phone" aria-hidden="true"></i> 73-50-00</h4>
                </div>
                <div class="col-md-5">
                    <strong>Новости</strong>
                    <br /><br />
                    <strong class="gray">В ТЦ «Сезон» открылся спортивный клуб</strong>
                    <br />
                    <i>09 сентября, 2016</i>
                    <br /><br />
                    <strong class="gray">Открытие спортивного клуба «Сезон»</strong>
                    <br />
                    <i>01 декабря, 2016</i>
                    <br /><br />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="yMap"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>