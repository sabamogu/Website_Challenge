<?php
echo "数字あてゲームを始めます！" . PHP_EOL;
echo "1から100までの数字を当ててください。" . PHP_EOL;
$num1 = random_int(1, 100);
$num3 = 0; // 回数カウント

while (true) {
    try {
        echo "1~100の数字を入力してください：";
        $line = trim(fgets(STDIN));

        // 数字以外が入力された場合のチェック
        if (!is_numeric($line)) {
            throw new Exception("「数字」を入力してください！");
        }

        $input = (int)$line;

        // 範囲チェック
        if ($input < 1 || $input > 100) {
            throw new Exception("1~100の範囲内で入力してください！");
        }

        // --- ここから判定（正しい入力のときだけ実行される） ---
        $num3++; // 判定に進む＝1回試行した

        if ($num1 > $input) {
            echo "もっと大きい数字です！" . PHP_EOL;
        } elseif ($num1 < $input) {
            echo "もっと小さい数字です！" . PHP_EOL;
        } else {
            echo "おめでとうございます！正解は {$num1} でした！" . PHP_EOL;
            break; // 正解なのでwhileを抜ける
        }

    } catch (Exception $e) {
        echo "入力ミス：" . $e->getMessage() . PHP_EOL;
        // catchが終わるとwhileの最初に戻ります
    }
}

echo "あなたは {$num3} 回目で正解しました。" . PHP_EOL;
?>