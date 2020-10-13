<h2 class="text-center mt-3"><?=$this->message?></h2>
<?php if (!empty($data['search'])): ?>
<div class="main__preview my-4 shadow__box">
    <div class="row pt-3">
        <div class="container d-flex justify-content-lg-around flex-wrap">
            <?php foreach ($data['search'] as $preview): ?>
            <div class="card col-12 col-lg-4 d-inline-block px-4 pt-3 border-white" style="width: 18rem;">
                <a data-fancybox="gallery" href="/assets/img/big-image/<?=$preview['img']?>">
                    <img src="/assets/img/<?=$preview['img']?>" class="card-img-top" alt="preview">
                </a>
                <div class="card-body px-0 pt-2">
                    <a class="views-update" data-id="<?=$preview['id']?>" href="/main/article/?id=<?=$preview['id'];?>"
                        class="card-text text-decoration-none"><?=$preview['title'];?></a>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$preview['read_time']?> mins | <i
                            class="fa fa-comment" aria-hidden="true"></i> <?=$content->commentsAmount($preview['id']);?>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <?=$preview['views']?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif;?>