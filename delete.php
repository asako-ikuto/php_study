<?php
$dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
$user = 'root';
$password = '';
//投稿削除
if (isset($_POST['deleteId'])) {
    $deleteId = htmlspecialchars($_POST['deleteId']);
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM post WHERE id = :deleteId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':deleteId', $deleteId);
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
    <h1>投稿の削除が完了しました。</h1>
    <form action="./index.php" method="post">
        <input type="submit" value="投稿一覧へ戻る">
    </form>
</body>

</html>