<?php
$content = $data['content'];
$id = $content->getHighlightId('chichi');
$table = $content->getColsFromPosts('`id`,`title`');
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">ChiChi</h1>
        <p>Current ChiChi id: <span id="id"><?=$id?></span></p>
        <input type="hidden" id="type" value="chichi">
    </div>
</header>

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