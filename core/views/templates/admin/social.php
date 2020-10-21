<?php $content = $data['content'];
$table = $content->getContent('social', 100);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Social</h1>
        <input type="hidden" id="type" value="social">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$item['icon']?></th>
                <th class="title"><?=$item['url']?></th>
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
            <input name="icon" type="text" placeholder="Icon">
            <input name="url" type="text" placeholder="Url">
            <input name="new" value="submit" type="submit">
        </fieldset>
    </form>
</div>