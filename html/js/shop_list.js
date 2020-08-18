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
