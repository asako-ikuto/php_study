<?php
$dsn = 'mysql:dbname=user;host=localhost;charset=utf8';
$user = 'root';
$password = '';
//編集対象の投稿データ取得
if (isset($_POST['editId'])) {
    $editId = htmlspecialchars($_POST['editId']);
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT name,content FROM post WHERE id = :editId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':editId', $editId);
        $stmt->execute();
        $editPost = $stmt->fetch(PDO::FETCH_ASSOC);
        $editName = $editPost['name'];
        $editContent = $editPost['content'];
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
    <h1>編集ページ</h1>
    <form action="./edit-complete.php" method="post" style="display: inline;">
        <label>name:</label>
        <input type="text" name="updateName" value="<?php echo $editName; ?>"><br>
        <label style="display: block;">投稿内容:</label>
        <textarea name="updateContent" cols="35" rows="18" style="margin-bottom: 5px;"><?php echo $editContent; ?></textarea><br>
        <input type="submit" value="更新">
        <input type="hidden" name="updateId" value="<?php echo $editId; ?>">
    </form>
    <form action="./index.php" method="post" style="display: inline;">
        <input type="submit" value="戻る">
    </form>
</body>

</html>