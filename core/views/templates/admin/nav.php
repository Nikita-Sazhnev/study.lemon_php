<?php $content = $data['content'];
$table = $content->getContent('navbar', 100);
?>
<header class="w-100">
    <div class="test">
        <h1 class="heading">Navigation</h1>
        <input type="hidden" id="type" value="navbar">
    </div>
</header>
<div class="tabel">
    <div class="row">

        <table>
            <?php foreach ($table as $item): ?>
            <tr>
                <th class="title"><?=$item['name']?></th>
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
            <input name="name" type="text" placeholder="Name of the category">
            <input name="url" type="text" placeholder="Action">
            <input name="dote" value="submit" type="submit">
        </fieldset>
    </form>
</div>