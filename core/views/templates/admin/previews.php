<?php $content = $data['content'];
$table = $content->getContent('previews', 100);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Previews</h1>
        <input type="hidden" id="type" value="previews">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$item['id']?></th>
                <th class="title"><?=$item['title']?></th>
                <th class="btn">
                    <a class="edit-link" href="?id=<?=$item['id']?>">[edit]</a>
                    <a href="#" data-id="<?=$item['id'];?>" class="edit-link delete">[x]</a>
                </th>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<div class="form">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add new one</legend>
            <input name="title" type="text" placeholder="Title">
            <input name="read_time" type="text" placeholder="Read time">
            <input name="url" type="text" placeholder="Arcticle ID">
            <input name="img_src" type="file" placeholder="Image">
            <input name="new" value="submit" type="submit">
        </fieldset>
    </form>
</div>