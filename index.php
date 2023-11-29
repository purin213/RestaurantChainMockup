<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

use Helpers\RandomGenerator;
// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 2;
$max = $_GET['max'] ?? 10;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$users = RandomGenerator::users($min, $max);
$employees = RandomGenerator::employees($min, $max);
sprintf("Length of %s", count($users));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
    </style>
</head>
<body>
    <h1>Restaurant Profiles</h1>
        <?php for ($i = 0; $i < count($users); $i++): ?>
            <div>
                <?php echo $users[$i]->toHTML(); ?>
                # FIX ME -> @emyloyee.php <?php echo $employees[$i]->toHTML(); ?>
            </div>
        <?php endfor; ?>
</body>
</html>
