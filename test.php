<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <form method="post">
        <input type="text" name="search_word">
        <input type="submit" value="検索">
    </form>
    <!-- 検索結果 -->
    <p>
        <?php
        $fruits = ['apple', 'orange', 'strawberry'];
        if (isset($_POST['search_word'])) {
            $search_word = htmlspecialchars($_POST['search_word']);
            if (in_array($search_word, $fruits)) {
                echo "{$search_word}は、配列に含まれています。";
            } else {
                echo "{$search_word}は、配列に含まれていません。";
            }
        }
        ?>
    </p>
</body>

</html>