// タブクリック時にタブ切り替えメソッド実行
$(document).ready(function(){
  $(".tab").click(function(){
    // クリックした順番を取得
    var number = $(".tab").index(this);
    // タブはクラスの追加と削除で切り替え
    $(".tab.active").removeClass("active");
    $(this).addClass("active");
    // 全てのcontentをhideにしてから
    $(".content").hide();
    // 選択したタブと一致するcontentをshow
    $(".content"+number).show();
  });
});

// 遷移時に別タブでもアンカーリンク先へ飛ぶ
$(document).ready(function(){
  // 遷移時に以下の例のようにhashを受け取る
  // 例　「#tab1#prefecture9」　
  const hash = location.hash;
  // ハッシュがあれば実行
  if (hash.length) {
    // #tabの形でハッシュが送られていたら実行
    if (hash.match(/#tab/)) {
      var tabNum = hash.slice(4,5);
      $(".tab.active").removeClass("active");
      $(".tab"+tabNum).addClass("active");
      $(".content").hide();
      $(".content"+tabNum).show();
    }
  }
});
