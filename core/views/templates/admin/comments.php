<?php $content = $data['content'];
$table = $content->getContent('comments', 10000);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Comments</h1>
        <input type="hidden" id="type" value="comments">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <tr style="background: #ffffff7a;">
                <th>Name</th>
                <th>Id</th>
                <th>Comment</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$content->getInfoById('login', $item['author_id'])?>,</th>
                <th class="title"><?=$item['id']?>,</th>
                <th class="title"><?=$item['body']?></th>
                <th class="btn">
                    <a class="edit-link" href="?id=<?=$item['id']?>">[edit]</a>
                    <a href="#" data-id="<?=$item['id'];?>" class="edit-link delete">[x]</a>
                </th>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>