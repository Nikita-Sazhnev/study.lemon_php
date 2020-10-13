<?php

use library\Comments;

$previews = $content->getContent('previews', 3);
$slider = $content->getContent('slider', 5);
$tags = $content->getContent('tags', 30);
$main = $content->getContent('posts', 1);
$main = $main[0];

?>
<main>
    <div class="bd-example shadow__box ">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($slider as $slide): ?>
                <div class="carousel-item <?=$slide['active'];?>" data-interval="3000">
                    <img src="/assets/img/Photo-main-big.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption col-5  d-md-block">
                        <img class="" src="/assets/img/<?=$slide['img_src']?>" alt="">
                        <h5 class="my-4"><?=$slide['title'];?></h5>
                        <p><?=$slide['description'];?></p>
                        <a href="/main/article/?id=<?=$slide['article_url']?>" class="btn btn-s btn-outline-dark">Get
                            it
                            recipe</a>
                    </div>
                </div>
                <?php endforeach;?>

                <ol class="carousel-indicators indicators-style">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
                </ol>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="main__preview mt-5 shadow__box">
        <div class="row pt-3">
            <div class="container d-flex justify-content-lg-around flex-wrap">
                <?php foreach ($previews as $preview): ?>
                <div class="card col-12 col-lg-4 d-inline-block px-4 pt-3 border-white" style="width: 18rem;">
                    <a data-fancybox="gallery" href="/assets/img/big-image/<?=$preview['img_src']?>">
                        <img src="/assets/img/<?=$preview['img_src']?>" class="card-img-top" alt="preview">
                    </a>
                    <div class="card-body px-0 pt-2">
                        <a class="views-update" data-id="<?=$preview['url'];?>"
                            href="/main/article/?id=<?=$preview['url'];?>"
                            class="card-text text-decoration-none"><?=$preview['title'];?></a>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$preview['read_time']?> mins | <i
                                class="fa fa-comment" aria-hidden="true"></i>
                            <?=$content->commentsAmount($preview['url']);?> <i class="fa fa-eye" aria-hidden="true"></i>
                            <?=$content->viewsAmount($preview['url'])?></p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php
$main = $content->getHighlightId('main');
$main = $content->getAllInfoById('posts', $main);
?>
    <div class="main__article mb-5 d-flex flex-wrap shadow__box">
        <div class="main__article-image col-12 col-lg-6 bg-white pl-lg-0 position-relative">
            <a data-fancybox="gallery" href="/assets/img/<?=$main['img']?>" class="main_article">
                <img src="/assets/img/<?=$main['img']?>" alt="Торт" class="w-100 h-100">
            </a>
            <img src="/assets/img/Icon-fav.png" alt="favorite-icon" class="icon-favorite position-absolute"
                id="favorite">
        </div>
        <div class="main__article-body col-12 col-lg-6 bg-white pl-3 pl-lg-0" style="height: 450px">
            <h1 class="article-heading-string mt-4"><a href="#" class="article-heading"><?=$main['title']?></a>
            </h1>
            <div class="row d-flex justify-content-between align-items-baseline ml-1 mr-2 mr-lg-5 mt-3">
                <p style="font-size: 18px; font-weight: 300; cursor: default;"><i class="fa fa-clock-o"
                        aria-hidden="true"></i> <?=$main['read_time']?>mins <i class="fa fa-signal"
                        aria-hidden="true"></i> <?=$main['difficult']?>
                </p>
                <button class="btn btn-sm btn-outline-dark text-uppercase">Save Recipe</button>
            </div>
            <div class="inner-scrolling mt-4">
                <p class=" mb-0">
                    <?=$main['summary'];?>
                </p>
                <h2 class="my-3">Directions</h2>
                <p>
                    <?=$main['body'];?>
                </p>
            </div>
        </div>
    </div>
</main>
<?php
$chichi = $content->getHighlightId('chichi');
$chichi = $content->getAllInfoById('posts', $chichi);
?>
<div class="modeles__group mb-4 d-flex justify-content-around flex-wrap">
    <div class="first__mcolum d-flex flex-column">
        <div class="articel__preview-modul modul__width shadow__box bg-white my-2 px-3 pt-4">
            <a href="/main/article?id=<?=$chichi['id']?>">
                <h4 class="underline text-center font-weight-bold"
                    style="font-family: 'Playfair Display', serif; color: #055555;">Chi-Chi or Chichi</h4>
            </a>
            <div class="article__author">
                <a href="#"><img src="/assets/img/comment-avatar.png" alt="" class="float-left ml-2"></a>
                <div class="article__author-about row pl-3">
                    <p class="my-0 mr-2 ">Recipe by </p>
                    <br>
                    <p class="m-0">
                        <strong><?=$content->getInfoById('login', $chichi['author_id']);?></strong>
                    </p>
                    <br>
                    <p class="m-0" style="cursor: default;"><i class="fa fa-clock-o" aria-hidden="true"></i>
                        20mins | <i class="fa fa-comment" aria-hidden="true"></i>
                        <? $content->commentsAmount($chichi['id'])?> <i class="fa fa-eye" aria-hidden="true"></i>
                        <?=$chichi['views']?>
                    </p>
                </div>
            </div>
            <div class="mt-2 article__slide row">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators indicatos_slide-preview">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/img/Photo-mail-small1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/Photo-mail-small2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/article_preview.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/Photo-mail-small3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/img/article_preview.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="target__modul modul__width shadow__box bg-white my-2 px-3 py-4" style="min-height: 20rem">
            <div class="target__modul-heading d-flex justify-content-between border-bottom">
                <h6 class="font-italic" style="font-size: 1.3rem;">Target</h6>
                <ul class="recipe__links d-flex" style="list-style: none;">
                    <li class="mr-2"><a href="#"><i class="fa fa-file-text-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-envelope-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-facebook align-content" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest align-content" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="target__modul-inner px-3">
                <h4 class="mt-4" style=" font-family:'Playfair Display', serif; color: #055555; font-weight: 700;">
                    Presintation line</h4>
                <div class="graphics">
                    <div class="canvas__wrapper d-flex mt-4">
                        <canvas id="canvas" height="70" width="70"></canvas>
                        <div class="graphic__about mt-2 ml-3">
                            <p class="mb-0 ">Housewives</p>
                            <p class="mb-0" style="line-height: 1; font-size: 0.7rem;">Lorem ipsum dolor sit
                                amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="canvas__wrapper d-flex mt-4">
                        <canvas id="canvas2" height="68" width="68"></canvas>
                        <div class="graphic__about mt-2 ml-3">
                            <p class="mb-0 ">Newlydyweds</p>
                            <p class="mb-0" style="line-height: 1; font-size: 0.7rem;">Lorem ipsum dolor sit
                                amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="canvas__wrapper d-flex mt-4">
                        <canvas id="canvas3" height="68" width="68"></canvas>
                        <div class="graphic__about mt-2 ml-3">
                            <p class="mb-0 ">Business lady</p>
                            <p class="mb-0" style="line-height: 1; font-size: 0.7rem;">Lorem ipsum dolor sit
                                amet, consectetur adipisicing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second__mcolum d-flex flex-column">
        <?php
$articlesEasy = $content->getArticleByDiff('Easy');
$articlesMiddle = $content->getArticleByDiff('Middle');
$articlesHard = $content->getArticleByDiff('Hard');
?>
        <div class="recipe__modul modul__width shadow__box bg-white my-2 px-3 py-4">
            <div class="recepi__modul-title d-flex justify-content-between border-bottom">
                <h6 class="font-italic" style="font-size: 1.3rem;">Recipe</h6>
                <ul class="recipe__links d-flex" style="list-style: none;">
                    <li class="mr-2"><a href="#"><i class="fa fa-file-text-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-envelope-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-facebook align-content" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest align-content" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="difficult__recipe d-flex justify-content-around px-3 mt-3 mb-4 text-uppercase">
                <div class="tabs">
                    <button class="text-uppercase px-2 btn btn-outline-dark tablinks active__link-recipe" href="#"
                        id="defaultOpen" onclick="openCity(event, 'easy')">Easy</button>
                    <button class="text-uppercase px-2 btn btn-outline-dark tablinks" href="#"
                        onclick="openCity(event, 'middle')">Middle</button>
                    <button class="text-uppercase px-2 btn btn-outline-dark tablinks" href="#"
                        onclick="openCity(event, 'long')">Long</button>
                </div>
            </div>
            <div class="recipe__preview-main tabcontent" id="easy">
                <?php foreach ($articlesEasy as $easy): ?>
                <div class="recipe__modul-inner mt-2 mb-4 d-flex">
                    <div class="col-3 p-0">
                        <a data-fancybox="gallery" href="/assets/img/big-image/<?=$easy['img'];?>">
                            <img src="/assets/img/<?=$easy['img'];?>" class="w-100" alt="">
                        </a>
                    </div>
                    <div class="article__modul-name px-2">
                        <p class="mb-0"><span>by</span>
                            <a href="/main/author/?id=<?=$easy['author_id'];?>"
                                style="font-size: 0.9rem; color: black;">
                                <strong>
                                    <?=$content->getInfoById('login', $easy['author_id']);?>
                                </strong>
                            </a>
                        </p>
                        <p class="mb-0 font-weight-bold" style="letter-spacing: -1px; line-height: 1;"><a
                                style="color: black;" class="views-update" data-id="<?=$easy['id']?>"
                                href="/main/article/?id=<?=$easy['id'];?>"><?=$easy['title']?>.</a></p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

            <div class="recipe__preview-main tabcontent id" id="middle">
                <?php foreach ($articlesMiddle as $middle): ?>
                <div class="recipe__modul-inner mt-2 mb-4 d-flex">
                    <div class="col-3 p-0">
                        <a data-fancybox="gallery" href="/assets/img/big-image/<?=$middle['img'];?>">
                            <img src="/assets/img/<?=$middle['img'];?>" class="w-100" alt="">
                        </a>
                    </div>
                    <div class="article__modul-name px-2">
                        <p class="mb-0"><span>by</span>
                            <a href="/main/author/?id=<?=$easy['author_id'];?>"
                                style="font-size: 0.9rem; color: black;">
                                <strong>
                                    <?=$content->getInfoById('login', $middle['author_id']);?>
                                </strong>
                            </a>
                        </p>
                        <p class="mb-0 font-weight-bold" style="letter-spacing: -1px; line-height: 1;"><a
                                style="color: black;" class="views-update" data-id="<?=$middle['id']?>"
                                href="/main/article/?id=<?=$middle['id'];?>"><?=$middle['title']?>.</a></p>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
            <div class="recipe__preview-main tabcontent id" id="long">
                <?php foreach ($articlesHard as $hard): ?>
                <div class="recipe__modul-inner mt-2 mb-4 d-flex">
                    <div class="col-3 p-0">
                        <a data-fancybox="gallery" href="/assets/img/big-image/<?=$hard['img'];?>">
                            <img src="/assets/img/<?=$hard['img'];?>" class="w-100" alt="">
                        </a>
                    </div>
                    <div class="article__modul-name px-2">
                        <p class="mb-0"><span>by</span>
                            <a href="/main/author/?id=<?=$easy['author_id'];?>"
                                style="font-size: 0.9rem; color: black;">
                                <strong>
                                    <?=$content->getInfoById('login', $hard['author_id']);?>
                                </strong>
                            </a>
                        </p>
                        <p class="mb-0 font-weight-bold" style="letter-spacing: -1px; line-height: 1;"><a
                                style="color: black;" class="views-update" data-id="<?=$hard['id']?>"
                                href="/main/article/?id=<?=$hard['id'];?>"><?=$hard['title']?>.</a></p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <button class="btn btn-sm btn-outline-dark text-uppercase float-right my-1">View More</button>
        </div>
        <div class="tags__modul modul__width shadow__box bg-white my-2 px-3 py-4">
            <div class="tags__modul-heading d-flex justify-content-start border-bottom">
                <h6 class="font-italic" style="font-size: 1.3rem;">Tags</h6>
            </div>
            <div class="hashtags text-uppercase mt-3" style="font-size: .8rem; line-height: 2;">
                <?php foreach ($tags as $tag): ?>
                <a href="/main/search/?search_string=<?=mb_strtolower($tag['tag']);?>">#<?=$tag['tag']?></a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="calendar__modul modul__width shadow__box bg-white my-2 px-3 py-4" style="min-height: 20rem">
            <div class="calendar__modul-heading d-flex justify-content-start border-bottom">
                <h6 class="font-italic" style="font-size: 1.3rem;">Calendar</h6>
            </div>
            <div class="custom-calendar-wrap">
                <div id="custom-inner" class="custom-inner">
                    <div class="custom-header clearfix">
                        <nav>
                            <span id="custom-prev" class="custom-prev"></span>
                            <span id="custom-next" class="custom-next"></span>
                        </nav>
                        <h2 id="custom-month" class="custom-month"></h2>
                        <h3 id="custom-year" class="custom-year"></h3>
                    </div>
                    <div id="calendar" class="fc-calendar-container"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
$popular = $content->getHighlightId('popular');
$popular = $content->getAllInfoById('posts', $popular);
?>
    <div class="third__mcolum d-flex flex-column">
        <div class="popual__modul modul__width shadow__box bg-white my-2 px-3 py-4"
            style="min-height: 21.9rem; background-image: url(/assets/img/popular_now.png); background-repeat: no-repeat; background-size: cover;">
            <h3 class="text-left"
                style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 2rem; color: #922323;">
                Popular Now</h3>
            <h4 class="font-weight-bold mt-5" style="font-size: 1.25rem;">
                <a class="views-update" data-id="<?=$popular['id']?>" href="main/article/?id=<?=$popular['id']?>"
                    style="color: black;"><?=$popular['title']?></a>
            </h4>
            <p class="mb-0" style="line-height: 1.1;"><?=$popular['preview_test']?></p>
            <div class="get__recipe-string d-flex justify-content-between">
                <a style="height: 2rem;" href="main/article/?id=<?=$popular['id']?>"
                    class="btn btn-s btn-outline-dark pt-1 pb-2 mt-3 views-update" data-id="<?=$popular['id']?>">
                    Get it recipe
                </a>
                <p class="mb-0 mt-4" style="font-size: .8rem; cursor: default;"><i class="fa fa-clock-o"
                        aria-hidden="true"></i> <?=$popular['read_time']?> mins | <i class="fa fa-comment"
                        aria-hidden="true"></i> <?=$content->commentsAmount($popular['id']);?>
                    <i class="fa fa-eye" aria-hidden="true"></i> <?=$popular['views'];?>
                </p>
            </div>
        </div>
        <div class="time-line__modul modul__width shadow__box bg-white my-2 px-3 py-4" style="min-height: 20rem;">
            <div class="time__modul-heading d-flex justify-content-between border-bottom">
                <h6 class="font-italic" style="font-size: 1.3rem;">Timeline</h6>
                <ul class="recipe__links d-flex" style="list-style: none;">
                    <li class="mr-2"><a href="#"><i class="fa fa-file-text-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-envelope-o align-content" aria-hidden="true"></i></a>
                    </li>
                    <li class="mr-2"><a href="#"><i class="fa fa-facebook align-content" aria-hidden="true"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-pinterest align-content" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
            <div class="target__modul-inner px-3">
                <h4 class="mt-4" style="font-family:'Playfair Display', serif; color: #055555; font-weight: 600;">Time
                    line</h4>
                <div class="rotate__box border-left pl-3" style="transform: rotate(-90deg);">
                    <div class="time__graph mb-5">
                        <p class="mb-0 text-uppercase">Easy</p>
                        <div class="graph__line d-flex align-items-baseline" style="margin-top: -7px;">
                            <div class="difficulty__line" style="height: 10px; width: 30%; background: #87d0c5;"></div>
                            <p class="ml-2 my-0 p-0">15mins</p>
                        </div>
                    </div>
                    <div class="time__graph mb-5">
                        <p class="mb-0 text-uppercase">Middle</p>
                        <div class="graph__line d-flex align-items-baseline" style="margin-top: -7px;">
                            <div class="difficulty__line" style="height: 10px; width: 45%; background: #0d5959;"></div>
                            <p class="ml-2 my-0 p-0">30mins</p>
                        </div>
                    </div>
                    <div class="time__graph mb-5">
                        <p class="mb-0 text-uppercase">Long</p>
                        <div class="graph__line d-flex align-items-baseline" style="margin-top: -7px;">
                            <div class="difficulty__line" style="height: 10px; width: 60%; background: #b50051;"></div>
                            <p class="ml-2 my-0 p-0">45mins</p>
                        </div>
                    </div>
                </div>
                <p class="mx-2 text-center px-4" style="line-height: 1; font-size: 0.8rem; margin-top: -2rem;">Lorem
                    ipsum dolor sit
                    amet, consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</div>
<?php if (!\library\Auth::isGuest()): ?>
<div class="comment__post bg-white my-1 py-3 py-lg-4 px-2 px-md-5 shadow__box">
    <div class="ahead__string d-flex justify-content-between">
        <h3 class="font-italic">Post a Comment</h3>
        <div class="comment__linking d-none d-sm-inline-block">
            <a target="_blank" class="font-weight-bolder font-italic" href="https://facebook.com">Faceboock</a>
            <span>|</span>
            <a target="_blank" class="font-weight-bolder font-italic" href="https://twitter.com">Twitter</a>
        </div>
    </div>
    <div class="form__string d-flex justify-content-between py-1 py-lg-2 px-1 px-lg-3 mb-3"
        style="background: #edefee;">
        <a href="#">
            <img src="/assets/img/comment-avatar.png" alt="">
        </a>
        <form class="form" action="#" name="post__comment" method="POST">
            <div class="input-group-append w-100" style="margin-top: 0.3rem;">
                <input id="comment-input" name="body" type="text" class="comment__input-text px-2"
                    style="min-height: 2.7rem;">
                <input type="hidden" name="parent_id" id="parent_id" value="0">
                <input type="hidden" name="author_id" value="<?=$_SESSION['user']['id']?>">
                <input type="hidden" name="place_id" value="0">
                <input type="submit" name="success" value="Post"
                    class="px-4 ml-1 bg-dark text-white text-uppercase "></input>
            </div>
        </form>
    </div>
</div>
<?php endif;?>
<div class="comments__view my-3 my-lg-5 bg-white shadow__box">
    <div class="comments__view-heading underline py-4 px-3 px-lg-5">
        <h3 class="font-italic">Comments</h3>
    </div>
    <?php
$comments = new Comments;
$commentsMain = $comments->getComments(0, 0);
if (count($commentsMain) == 0) {
    echo "<h1 class=\"text-center\">There are no comments yet, be the first</h1>";
}
?>
    <div class="comment__shell px-3 px-lg-5 pb-3 pb-lg-5 mb-3">
        <?php foreach ($commentsMain as $comment): ?>
        <div class="comment__body row">
            <div class="avatar__place col-auto col-lg-1 ml-1 m-lg-0 pr-3 pr-lg-0 d-flex justify-content-end">
                <a href="#">
                    <img src="/assets/img/comment-avatar.png" class="mb-2" alt="">
                </a>
            </div>
            <div class="comment__body-place col-auto col-lg-11 pl-3 pl-lg-5">
                <p class="m-0">post by</p>
                <div class="name__info-string d-flex justify-content-between">
                    <div class="name__reply d-flex">
                        <h4 class="font-weight-bold comment__name" style="font-size: 1.1rem;">
                            <?=$content->getInfoById('login', $comment['author_id']);?></h4>
                        <a href="#comment-input" class="reply__btn btn-sm mx-2">Reply</a>
                        <p class="parent_id"><?=$comment['id']?></p>
                    </div>
                    <p class="mr-3 d-inline-block"> <i
                            class="fa fa-thumbs-o-up <?php $comments->isActiveLike($userId, $comment['id'], 'comment')?>"
                            aria-hidden="true" style="cursor: pointer;" data-id="<?=$comment['id'];?>"
                            data-type="comment"></i> <span
                            class="like-amount"><?php $comments->likeAmount($comment['id'], 'comment');?></span> </p>
                </div>
                <date class="comment__data d-block"><?=$comment['date']?></date>

                <p class="comment-sense underline mb-1"><?=$comment['body']?></p>
                <div class="answers">
                    <?php $commentsNested = $comments->getComments($comment['id'], 0);?>
                    <?php foreach ($commentsNested as $commentNested): ?>
                    <div class="comment__body row comment-nested hide">
                        <div
                            class="avatar__place col-auto col-lg-1 ml-1 m-lg-0 pr-3 pr-lg-0 d-flex justify-content-end">
                            <a href="#">
                                <img src="/assets/img/comment-avatar.png" class="mb-2" alt="">
                            </a>
                        </div>
                        <div class="comment__body-place col-auto col-lg-11 pl-3 pl-lg-5">
                            <p class="m-0">post by</p>
                            <div class="name__info-string d-flex justify-content-between">
                                <div class="name__reply d-flex">
                                    <h4 class="font-weight-bold comment__name" style="font-size: 1.1rem;">
                                        <?=$content->getInfoById('login', $commentNested['author_id']);?>
                                    </h4>
                                    <a href="#comment-input" class="reply__btn btn-sm mx-2">Reply</a>
                                    <p class="parent_id"><?=$comment['id']?></p>
                                </div>
                                <p class="mr-3 d-inline-block"><i
                                        class="fa fa-thumbs-o-up <?php $comments->isActiveLike($userId, $commentNested['id'], 'comment')?>"
                                        aria-hidden="true" style="cursor: pointer;" data-id="<?=$commentNested['id']?>"
                                        data-type="comment"></i> <span
                                        class="like-amount"><?php $comments->likeAmount($commentNested['id'], 'comment');?></span>
                                </p>
                            </div>
                            <date class="comment__data d-block"><?=$commentNested['date'];?></date>
                            <p class="comment-sense mb-1 font-weight-bold"><?=$commentNested['body'];?></p>
                        </div>

                    </div>
                    <?php endforeach;?>
                    <!-- Второй уровень вложености -->
                    <?php if (count($commentsNested) > 2): ?>
                    <button class="more-btn w-100 border-0 font-weight-light underline my-1 my-lg-2"
                        style="outline: none; background: none;">More comments</button>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
</div>