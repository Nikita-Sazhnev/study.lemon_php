<?php
$content = $data['content'];
$comment = $content->getAllInfoById('comments', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Comment</h1>
        <input type="hidden" id="type" value="comments">
    </div>
</header>
<div class="form">
    <form action="#" method="post">
        <fieldset>
            <legend>Edit this one</legend>
            <input style="width: 500px;" name="body" value="<?=$comment['body'];?>" type="text"
                placeholder="Name of the category">
            <input name="id" type="hidden" value="<?=$comment['id'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/comments">Back</a>
    </form>
</div>