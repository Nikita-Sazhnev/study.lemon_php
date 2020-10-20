<?php
$content = $data['content'];
$post = $content->getAllInfoById('posts', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Article</h1>
        <input type="hidden" id="type" value="slider">
    </div>
</header>
<div class="form post">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add new one</legend>
            <input name="title" type="text" value="<?=$post['title'];?>">
            <input name="summary" type="text" value="<?=$post['summary'];?>">
            <input name="preview_test" type="text" value="<?=$post['preview_test'];?>">
            <input name="body" type="text" value="<?=$post['body'];?>">
            <input name="read_time" type="text" value="<?=$post['read_time'];?>">
            <input name="author_id" type="text" value="<?=$post['author_id'];?>">
            <input name="tags" type="text" value="<?=$post['tags'];?>">
            <select name="difficult">
                <option value="<?=$post['difficult']?>">No change</option>
                <option value="Easy">Easy</option>
                <option value="Middle">Middle</option>
                <option value="Hard">Hard</option>
            </select>
            <input name="img_src" type="file" placeholder="Image">
            <input name="id" type="hidden" value="<?=$post['id'];?>">
            <input name="default_name" type="hidden" value="<?=$post['img'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
    </form>
</div>

<div class="image-holder">
    <img src="/assets/img/<?=$post['img']?>" alt="post">
</div>