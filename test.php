<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <h2>日本の首都は？</h2>
    <form method="post">
        <input type="text" name="capital_answer">
        <input type="submit" value="OK">
    </form>
    <!-- 正解・不正解判定結果 -->
    <p style="font-size:1.2rem">
        <?php
        if (isset($_POST['capital_answer'])) {
            $capital_answer = htmlspecialchars($_POST['capital_answer']);
            if ($capital_answer === '東京') {
                echo '正解';
            } else {
                echo '不正解';
            }
        }
        ?>
    </p>
</body>

</html>