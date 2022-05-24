<form action="index.php" method="post">
    <div>
        <label>タイトル：</label>
        <input class="form-control" name="name">
        <label>色：</label>
        <input class="form-control" name="color"> 
        <label>サイズ：</label>
        <input class="form-control" name="size"> 
    <input class="btn btn-light" type="submit" value="投稿">
</form>

<?php foreach ($results as $post) { ?>
    <p>
    <?= $post["id"] ?> <a href="show.php?id=<?= $post["id"] ?>"><?= $post["name"] ?></a>
    </p>
<?php } ?>