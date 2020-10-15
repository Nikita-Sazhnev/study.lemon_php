<?php $content = $data['content'];
$id = $content->getHighlightId('popular');
$table = $content->getColsFromPosts('`id`,`title`');
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Popular</h1>
        <p>Current Popular Now id: <span id="id"><?=$id?></span></p>

    </div>
</header>
<div class="form">
    <form action="#" method="post">
        <h2>Uplode picture</h2>
        <input type="file" name="file" accept="image/png">
        <input type="submit" value="uplode">
    </form>
</div>
<div class="tabel">
    <div class="row">

        <table>
            <?php foreach ($table as $item): ?>
            <tr>
                <th>id: <?=$item[0]?></th>
                <th class="title"><?=$item['title']?></th>
                <th class="btn" data-id="<?=$item['id']?>"><button>✔</button></th>
            </tr>
            <?php endforeach;?>
        </table>
    </div>

</div>