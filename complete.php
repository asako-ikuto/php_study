<?php
$dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
$user = 'root';
$password = '';
//新規投稿
if (isset($_POST['name']) && isset($_POST['content'])) {
    $name = htmlspecialchars($_POST['name']);
    $content = htmlspecialchars($_POST['content']);
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO post (name, content) VALUE (:name, :content)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        print($e->getMessage());
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <h1>投稿が完了しました。</h1>
    <form action="./index.php" method="post">
        <input type="submit" value="投稿一覧へ戻る">
    </form>
</body>

</html>