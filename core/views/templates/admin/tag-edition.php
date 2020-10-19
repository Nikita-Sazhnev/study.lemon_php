<?php
$content = $data['content'];
$tag = $content->getAllInfoById('tags', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Navigation</h1>
        <input type="hidden" id="type" value="tags">
    </div>
</header>
<div class="form">
    <form action="#" method="post">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="tag" value="<?=$tag['tag'];?>" type="text" placeholder="Name of the category">
            <input name="id" type="hidden" value="<?=$tag['id'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/tags">Back</a>
    </form>
</div>