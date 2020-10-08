<?php $post = $data['post'];
?>

<??>
<div class="container my-4">
    <h1><?=$post['title'];?></h1>
    <p><?=$post['summary'];?></p>
    <article><?=$post['body'];?></article>
    <img class="w-100" src="/assets/img/<?=$post['img'];?>" alt="">
</div>