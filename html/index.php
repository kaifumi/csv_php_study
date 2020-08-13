<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>php7.4-apache</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>ハローワールド</h1>
<?php
$row = 1;
// ファイルが存在しているかチェックする
if (($handle = fopen("csv/AMU PAY SHOP LIST.csv", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
        echo "${row}行目\n";
        $row++;
        foreach ($data as $value) {
            echo "「${value}」\n";
        }
    }
    fclose($handle);
}

?>
</body>
</html>