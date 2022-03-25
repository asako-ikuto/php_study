<?php
$hands = ['グー', 'チョキ', 'パー'];
$win_massage = 'あなたの勝利です！';
$lose_massage = 'あなたの敗北です。。。';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP Study</title>
</head>

<body>
    <form method="post">
        <select name="player_hand">
            <option value="グー">グー</option>
            <option value="チョキ">チョキ</option>
            <option value="パー">パー</option>
        </select>
        <br>
        <input type="submit" value="じゃんけん！">
    </form>
    <p>
        <?php
        if (isset($_POST['player_hand'])) {
            //プレイヤーが選択した手
            $player_hand = htmlspecialchars($_POST['player_hand']);
            //相手の手をランダムで選択
            $key = array_rand($hands);
            $other_hand = $hands[$key];
            //勝敗判定
            switch ($player_hand) {
                case ($player_hand === $other_hand):
                    $result = 'あいこ';
                    break;
                case 'グー':
                    $result = ($other_hand === 'チョキ') ? $win_massage : $lose_massage;
                    break;
                case 'チョキ':
                    $result = ($other_hand === 'パー') ? $win_massage : $lose_massage;
                    break;
                case 'パー':
                    $result = ($other_hand === 'グー') ? $win_massage : $lose_massage;
                    break;
            }
            echo "自分： {$player_hand}<br>
                  相手： {$other_hand}<br>
                  {$result}";
        }
        ?>
    </p>
</body>

</html>