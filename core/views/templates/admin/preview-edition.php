<?php
$content = $data['content'];
$preview = $content->getAllInfoById('previews', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Preview</h1>
        <input type="hidden" id="type" value="navbar">
    </div>
</header>
<div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="title" value="<?=$preview['title'];?>" type="text" placeholder="Name of the category">
            <input name="url" value="<?=$preview['url'];?>" type="text" placeholder="Article Url">
            <input name="read_time" value="<?=$preview['read_time'];?>" type="text" placeholder="Read Time">
            <input name="img_src" type="file" placeholder="Image">
            <input name="id" type="hidden" value="<?=$preview['id'];?>">
            <input name="default_name" type="hidden" value="<?=$preview['img_src'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/previews">Back</a>
    </form>
</div>