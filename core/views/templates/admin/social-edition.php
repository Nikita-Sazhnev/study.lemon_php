<?php
$content = $data['content'];
$nav = $content->getAllInfoById('social', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Social</h1>
        <input type="hidden" id="type" value="social">
    </div>
</header>
<div class="form">
    <form action="#" method="post">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="icon" value="<?=$nav['icon'];?>" type="text" placeholder="Icon">
            <input name="url" value="<?=$nav['url'];?>" type="text" placeholder="Url">
            <input name="id" type="hidden" value="<?=$nav['id'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/social">Back</a>
    </form>
</div>