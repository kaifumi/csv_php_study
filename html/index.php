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
// echo  __DIR__ . "<br />";
// echo './csv/AMU_PAY_SHOP_LIST.csv';
// $row = 1;
// $filepath = "../csv/AMU_PAY_SHOP_LIST.csv";
// $file = file_get_contents($filepath);
// $lines = str_getcsv($file, "\r\n");
// foreach ($lines as $line) {
//     $records[] = str_getcsv($line);
// }

// var_dump ($records);
// var_dump ($file);

$row = 1;
// ファイルが存在しているかチェックする
if (($handle = fopen("../csv/AMU_PAY_SHOP_LIST.csv", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
        echo "${row}行目\n";
        $row++;
        foreach ($data as $value) {
            echo "${value}\n";
        }
    }
    fclose($handle);
}

?>
</body>
</html>