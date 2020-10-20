<?php $post = $data['post'];
?>
<??>
<div class="my-4">
    <h1><?=$post['title'];?></h1>
    <p><?=$post['summary'];?></p>
    <article><?=$post['body'];?></article>
    <img class="w-100 mb-4" src="/assets/img/<?=$post['img'];?>" alt="Photo of dishes">
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
                    <input type="hidden" name="place_id" value="<?=$post['id']?>">
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
$comments = new library\Comments;
$commentsMain = $comments->getComments(0, $post['id']);
if (count($commentsMain) == 0) {
    echo "<h1 class=\"text-center\">There are no comments yet, be the first</h1>";
}?>
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
                                <a href="/main/author?id=<?=$comment['author_id'];?>">
                                    <?=$content->getInfoById('login', $comment['author_id']);?>
                                </a>
                            </h4>
                            <a href="#comment-input" class="reply__btn btn-sm mx-2">Reply</a>
                            <p class="parent_id"><?=$comment['id']?></p>
                        </div>
                        <p class="mr-3 d-inline-block"> <i
                                class="fa fa-thumbs-o-up <?php $comments->isActiveLike($userId, $comment['id'], 'comment')?>"
                                aria-hidden="true" style="cursor: pointer;" data-id="<?=$comment['id'];?>"
                                data-type="comment"></i> <span
                                class="like-amount"><?php $comments->likeAmount($comment['id'], 'comment');?></span>
                        </p>
                    </div>
                    <date class="comment__data d-block"><?=$comment['date']?></date>

                    <p class="comment-sense underline mb-1"><?=$comment['body']?></p>
                    <div class="answers">
                        <?php $commentsNested = $comments->getComments($comment['id'], $post['id']);?>
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
                                            <a href="/main/author?id=<?=$commentNested['author_id'];?>">
                                                <?=$content->getInfoById('login', $commentNested['author_id']);?>
                                            </a>
                                        </h4>
                                        <a href="#comment-input" class="reply__btn btn-sm mx-2">Reply</a>
                                        <p class="parent_id"><?=$comment['id']?></p>
                                    </div>
                                    <p class="mr-3 d-inline-block"><i
                                            class="fa fa-thumbs-o-up <?php $comments->isActiveLike($userId, $commentNested['id'], 'comment')?>"
                                            aria-hidden="true" style="cursor: pointer;"
                                            data-id="<?=$commentNested['id']?>" data-type="comment"></i> <span
                                            class="like-amount"><?php $comments->likeAmount($commentNested['id'], 'comment');?></span>
                                    </p>
                                </div>
                                <date class="comment__data d-block"><?=$commentNested['date'];?></date>
                                <p class="comment-sense mb-1 font-weight-bold"><?=$commentNested['body'];?></p>
                            </div>

                        </div>
                        <?php endforeach;?>
                        <!-- Второй уровень вложености -->
                        <?php if (count($commentsNested) > 3): ?>
                        <button class="more-btn w-100 border-0 font-weight-light underline my-1 my-lg-2"
                            style="outline: none; background: none;">More comments</button>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>