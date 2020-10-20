<?php
$content = $data['content'];
$users = $content->getAllInfoById('users', $_GET['id']);
?>

<header class="w-100">
    <div class="test">
        <h1 class="heading">Edit Authors</h1>
        <input type="hidden" id="type" value="slider">
    </div>
</header>
<div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Edit this one</legend>
            <input name="login" value="<?=$users['login'];?>" type="text" placeholder="Login">
            <input name="email" value="<?=$users['email'];?>" type="text" placeholder="Email">
            <select name="role" id="role">
                <option value="<?=$users['role']?>">No change</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input name="img_src" type="file">

            <input name="id" type="hidden" value="<?=$users['id'];?>">
            <input name="default_name" type="hidden" value="<?=$users['avathar'];?>">
            <input name="edit" value="done" type="submit">
        </fieldset>
        <a class="edit-link" href="/admin/author">Back</a>
    </form>
</div>
<div class="image-holder">

    <img src="/assets/img/<?=$users['avathar']?>" alt="users">
</div>