<?php
$dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
$user = 'root';
$password = '';
//編集内容で更新
if (isset($_POST['updateId']) && isset($_POST['updateName']) && isset($_POST['updateContent'])) {
    $updateId = htmlspecialchars($_POST['updateId']);
    $updateName = htmlspecialchars($_POST['updateName']);
    $updateContent = htmlspecialchars($_POST['updateContent']);
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE post SET name = :updateName, content = :updateContent WHERE id = :updateId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':updateId', $updateId);
        $stmt->bindValue(':updateName', $updateName);
        $stmt->bindValue(':updateContent', $updateContent);
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
    <h1>編集が完了しました。</h1>
    <form action="./index.php" method="post">
        <input type="submit" value="投稿一覧へ戻る">
    </form>
</body>

</html>