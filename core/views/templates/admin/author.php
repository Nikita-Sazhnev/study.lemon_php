<?php $content = $data['content'];
$table = $content->getContent('users', 1000);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Authors</h1>
        <input type="hidden" id="type" value="users">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <tr style="background: #ffffff7a;">
                <th>Id</th>
                <th>Name</th>
                <th>Avathar</th>
                <th>Role</th>
                <th></th>
            </tr>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$item['id'];?></th>
                <th class="title"><?=$item['login']?>,</th>
                <th class="title"><?=$item['avathar']?></th>
                <th class="title">|<?=$item['role']?></th>
                <th class="btn">
                    <a class="edit-link" href="?id=<?=$item['id']?>">[edit]</a>
                    <a href="#" data-id="<?=$item['id'];?>" class="edit-link delete">[x]</a>
                </th>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>