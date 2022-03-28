<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <h2>FizzBuzz問題</h2>
    <form method="post">
        <label style="width: 85px; display: inline-block;">FizzNum:</label><input type="text" name="fizz_num" placeholder="整数値を入力してください"><br>
        <label style="width: 85px; display: inline-block;">BuzzNum:</label><input type="text" name="buzz_num" placeholder="整数値を入力してください"><br>
        <input type="submit" value="実行">
    </form>
    <p>【出力】</p>
    <ul style="padding: 0; list-style: none;">
        <?php
        if (isset($_POST['fizz_num']) && isset($_POST['buzz_num'])) {
            $fizz_num = htmlspecialchars($_POST['fizz_num']);
            $buzz_num = htmlspecialchars($_POST['buzz_num']);
            //整数、空欄チェック
            if (!ctype_digit($fizz_num) || !ctype_digit($buzz_num)) {
                echo "<li>整数値を入力してください</li>";
                return;
            }
            //FIzzBuzz関数
            for ($i = 1; $i < 100; $i++) {
                if ($i % $fizz_num == 0 && $i % $buzz_num == 0) {
                    echo "<li>FizzBuzz {$i}</li>";
                } elseif ($i % $fizz_num == 0) {
                    echo "<li>Fizz {$i}</li>";
                } elseif ($i % $buzz_num == 0) {
                    echo "<li>Buzz {$i}</li>";
                } else {
                    echo "<li>{$i}</li>";
                }
            }
        }
        ?>
    </ul>
</body>

</html>