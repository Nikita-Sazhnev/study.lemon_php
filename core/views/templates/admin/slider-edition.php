<?php
$content = $data['content'];
$slide = $content->getAllInfoById('slider', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Slide</h1>
        <input type="hidden" id="type" value="slider">
    </div>
</header>
<div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="title" value="<?=$slide['title'];?>" type="text" placeholder="Title">
            <input name="description" value="<?=$slide['description'];?>" type="text" placeholder="Description">
            <input name="article_url" value="<?=$slide['article_url'];?>" type="text" placeholder="Article Id">
            <input name="img_src" type="file">
            <input name="id" type="hidden" value="<?=$slide['id'];?>">
            <input name="default_name" type="hidden" value="<?=$slide['img_src'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/slider">Back</a>
    </form>
</div>
<div class="image-holder">

    <img src="/assets/img/<?=$slide['img_src']?>" alt="slide">
</div>