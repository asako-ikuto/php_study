<?php
$question["問題"] = "日本の首都は？";
$answer["回答1"] = "大阪";
$answer["回答2"] = "北海道";
$answer["回答3"] = "箱根";
$answer["回答4"] = "東京";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <h2>問題
        <?php
        echo $question["問題"];
        ?>
    </h2>
    <p>
        <?php
        foreach ($answer as $key => $value) {
            echo "{$key} {$value}<br>";
        }
        ?>
    </p>
</body>

</html>