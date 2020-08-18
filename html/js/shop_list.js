// クリック時にタブ切り替えメソッド実行
document.addEventListener('DOMContentLoaded', function(){
  // tabを持つ要素の配列を用意
  const tabs = document.getElementsByClassName("tab");
  tabsAry = Array.prototype.slice.call(tabs);

  // タブ切り替えメソッド
  function tabSwitch() {

    // tabの選択状態切り替え
    document.getElementsByClassName("active")[0].classList.remove("active");
    this.classList.add("active");

    // contentの表示切り替え
    document.getElementsByClassName("show")[0].classList.remove("show");
    const index = tabsAry.indexOf(this);
    document.getElementsByClassName("content")[index].classList.add("show");
  }

  tabsAry.forEach(function(value) {
    value.addEventListener("click", tabSwitch);
  });
});

// 遷移時に別タブでもアンカーリンク先へ飛べるようにする
document.addEventListener('DOMContentLoaded', function(){
  // tabの配列とcontentの配列を用意
  const tabs = document.getElementsByClassName("tab");
  tabsAry = Array.prototype.slice.call(tabs);
  const contents = document.getElementsByClassName("content");
  contentsAry = Array.prototype.slice.call(contents);

  // hashの値を受け取る
  const hash = location.hash;
  if (hash.length) {
  // ハッシュがあれば実行
    if (hash.match(/#tab/)) {
    // ハッシュタグが「#tab〜」の形になっていたら
      // 全てのtabからactiveを外す
      for (let i=0; i < tabsAry.length; i++) {
        document.getElementsByClassName("tab")[i].classList.remove("active");
      }
      let number = hash.slice(4, 6);
      if (number.includes('#')) {
        number = hash.slice(4, 5)
      }
      // 該当するtabにactiveをつける
      document.getElementsByClassName("tab")[number].classList.add("active");

      // 全てのcontentからshowを外す
      for (let i=0; i < contentsAry.length; i++) {
        document.getElementsByClassName("content")[i].classList.remove("show");
      }
      // 該当するcontentにshowをつける
      document.getElementsByClassName("content")[number].classList.add("show");
    } else {
      // hashが#tab~じゃなければ1番目のタブにactiveを与える
      document.getElementsByClassName("tab")[0].classList.add("active");
      document.getElementsByClassName("show")[0].classList.add("show");
    }
  } else {
    // hashが無かったら1番目のタブにactiveを与える
    document.getElementsByClassName("tab")[0].classList.add("active");
    document.getElementsByClassName("show")[0].classList.add("show");
  }
});

$(document).ready(function(){
  $("#sample1").click(function(){
    $("#sample2").hide();
    $(this).css('color', 'red');
    console.log("test");
  });
});