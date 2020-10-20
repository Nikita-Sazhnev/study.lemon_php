<?php
$content = $data['content'];
$nav = $content->getAllInfoById('navbar', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Navigation</h1>
        <input type="hidden" id="type" value="navbar">
    </div>
</header>
<div class="form">
    <form action="#" method="post">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="name" value="<?=$nav['name'];?>" type="text" placeholder="Name of the category">
            <input name="url" value="<?=$nav['url'];?>" type="text" placeholder="Action">
            <input name="id" type="hidden" value="<?=$nav['id'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/nav">Back</a>
    </form>
</div>