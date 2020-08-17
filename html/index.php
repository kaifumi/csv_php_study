<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>csv_php_study</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="area">
  <?php
    include('prefecture.php');
    include('shop_info.php');

    $number = 1;
    $i = 1;
    $prefecture_num = range(0, 47);

    // 地域区分ごとに表示
    foreach($areas as $area) { ?>
      <input type="radio" name="tab_name" id="tab<?= $number; ?>" <?php if ($number == 1) {echo "checked";} ?> >
      <label class="tab_class" for="tab<?= $number; ?>"><?= $area ?></label>
      <div class="content_class">
        <a href=""></a>
        <?
          // 都道府県ごとのリンクを生成
          foreach($per_district_records[$number-1] as $record) { ?>
            <a href="#<?= $record[1]; ?>"><?= $record[0]; ?></a>
          <? }

          // 店舗ごとの情報出力
          foreach($per_district_shops[$number-1] as $shop) {

            // 都道府県コードが一致したら表示
            if (array_search($shop[1], $prefecture_num)) { ?>
              <h1 id="<?= $shop[1] ?>"><?= $shop[0]; ?></h1>
            <? unset($prefecture_num[$shop[1]]);
            }

            // 値が空白の部分を取り除く
            $shop = array_diff($shop, array(""));

            // 指定の値のみ出力
            $output = [2, 5, 6, 8];
            foreach($output as $num) {
              echo $shop[$num] . "<br/>";
            }

            // 地図情報があれば表示
            if ($shop[8] != "") {
                echo "<a href='" . $shop[8] . "' target='_blank'>MAP</a><br/>";
            } ?>
            <p>--------------------</p>
          <? } ?>
      </div>
      <? $number++;
      // next($areas);
    } ?>
  </div>
</body>
</html>
