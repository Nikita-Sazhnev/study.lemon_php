<?php $content = $data['content'];
$table = $content->getContent('tags', 100);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Tags</h1>
        <input type="hidden" id="type" value="tags">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$item['tag']?></th>
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
    <form action="#" method="post">
        <fieldset>
            <legend>Add new one</legend>
            <input name="tag" type="text" placeholder="Tag Name">
            <input name="new" value="submit" type="submit">
        </fieldset>
    </form>
</div>