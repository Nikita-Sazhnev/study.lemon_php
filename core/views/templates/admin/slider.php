<?php $content = $data['content'];
$table = $content->getContent('slider', 5);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Slider</h1>
        <input type="hidden" id="type" value="slider">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <tr style="background: #ffffff7a;">
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($table as $item): ?>
            <tr>

                <th class="title"><?=$item['id']?>,</th>
                <th class="title"><?=$item['title']?></th>
                <th class="title">|<?=$item['description']?></th>
                <th class="btn">
                    <a class="edit-link" href="?id=<?=$item['id']?>">[edit]</a>
                </th>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>