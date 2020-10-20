<?php $content = $data['content'];
$table = $content->getContent('posts', 9000);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Articles</h1>
        <input type="hidden" id="type" value="posts">
    </div>
</header>
<div class="tabel">
    <div class="row">
        <table>
            <tr style="background: #ffffff7a;">
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
<div class="form post">
    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add new one</legend>
            <input name="title" type="text" placeholder="Title">
            <input name="summary" type="text" placeholder="Summary">
            <input name="preview_test" type="text" placeholder="Preview Text">
            <input name="body" type="text" placeholder="Main text">
            <input name="read_time" type="text" placeholder="Read time">
            <input name="author_id" type="text" placeholder="Autrho ID">
            <input name="tags" type="text" placeholder="Tags">
            <select name="difficult">
                <option value="Easy">Easy</option>
                <option value="Middle">Middle</option>
                <option value="Hard">Hard</option>
            </select>
            <input name="img_src" type="file" placeholder="Image">
            <input name="new" value="submit" type="submit">
        </fieldset>
    </form>
</div>