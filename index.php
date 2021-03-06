<?php
//投稿一覧取得
$dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM post";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $posts = array();
    $count = $stmt->rowCount();
    while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $post;
    }
} catch (PDOException $e) {
    print($e->getMessage());
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <h1>掲示板</h1>
    <h2>新規投稿</h2>
    <form action="./complete.php" method="post">
        <label>name:</label>
        <input type="text" name="name"><br>
        <label style="display: block;">投稿内容:</label>
        <textarea name="content" cols="35" rows="18" style="margin-bottom: 5px;"></textarea><br>
        <input type="submit" value="投稿">
    </form>
    <h2>投稿内容一覧</h2>
    <?php foreach ($posts as $key => $post) : ?>
        <div style="background-color: #88EAFB; border: solid 2px #6BB7C5; padding: 2px; margin-bottom: 30px;">
            <ul style="padding: 5px 15px; list-style: none; border: solid 2px #6BB7C5; background-color: #fff; margin: 0;">
                <li>No:<?php echo $key + 1; ?></li>
                <li>名前:<?php echo $post['name']; ?></li>
                <li>投稿内容:<?php echo $post['content']; ?></li>
                <form action="./edit.php" method="post" style="margin-top: 20px;">
                    <input type="submit" value="編集">
                    <input type="hidden" name="editId" value="<?php echo $post['id']; ?>">
                </form>
                <form action="./delete.php" method="post">
                    <input type="submit" value="削除">
                    <input type="hidden" name="deleteId" value="<?php echo $post['id']; ?>">
                </form>
            </ul>
        </div>
    <?php endforeach; ?>
</body>

</html>