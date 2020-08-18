<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>shop_list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/shop_list.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
      document.write("<div>location.hrefは「" + location.href + "」</div>");
      document.write("<div>location.protocolは「" + location.protocol + "」</div>");
      document.write("<div>location.hostnameは「" + location.hostname + "」</div>");
      document.write("<div>location.hostは「" + location.host + "」</div>");
      document.write("<div>location.portは「" + location.port + "」</div>");
      document.write("<div>location.pathnameは「" + location.pathname + "」</div>");
      document.write("<div>location.searchは「" + location.search + "」</div>");
      document.write("<div>location.hashは「" + location.hash + "」</div>");
    </script>
</head>
<body>
  <div class="main">
  <?php
    include('prefecture.php');
    include('shop_info.php');

    $number = 1;
    $i = 1;
    $prefecture_num = range(0, 47); ?>

    <ul class="tab-group">
        <? foreach($areas as $v) : ?>
          <li class="tab tab<?= array_search($v, $areas); if (array_search($v, $areas) == 0) {echo " active";} ?>"><?= $v; ?></li>
        <? endforeach; ?>
    </ul>

    <!-- 地域区分ごとに表示 -->
    <? foreach($areas as $area) : ?>
      <!-- 他の地域は表示しない -->
      <div class="content content<?= array_search($area, $areas); if (array_search($area, $areas) == 0) {echo " show";} ?>">

        <!-- 都道府県ごとのリンクを生成 -->
        <? foreach($per_district_records[$number-1] as $record) : ?>
            <a href="#tab<?= array_search($area, $areas) ?>#prefecture<?= $record[1]; ?>"><?= $record[0]; ?></a>
        <? endforeach;

          // 店舗ごとの情報出力
          foreach($per_district_shops[$number-1] as $shop) :

            // 都道府県コードが一致したら表示
            if (array_search($shop[1], $prefecture_num)) { ?>
              <h1 id="tab<?= array_search($area, $areas) ?>#prefecture<?= $shop[1] ?>"><?= $shop[0]; ?></h1>
            <? unset($prefecture_num[$shop[1]]);
            }

            // 値が空白の部分を取り除く
            $shop = array_diff($shop, array(""));

            // 店舗情報　指定の値のみ出力
            $output = [2, 5, 6, 8];
            foreach($output as $num) {
              echo $shop[$num] . "<br/>";
            }

            // 地図情報があれば表示
            if ($shop[8] != "") {
              echo "<a href='" . $shop[8] . "' target='_blank'>MAP</a><br/>";
            } ?>
            <p>--------------------</p>
          <? endforeach; ?>
      </div>
      <? $number++;
    endforeach; ?>
  </div>
</body>
</html>
