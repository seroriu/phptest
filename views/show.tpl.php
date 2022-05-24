<form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image">
        <button><input type="submit" name="upload" value="送信"></button>
    </form>

    <p>
    <?= $show["id"] ?> <?= $show["name"] ?>
    </p>
