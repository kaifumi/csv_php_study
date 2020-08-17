document.addEventListener('DOMContentLoaded', function(){
  const tabs = document.getElementsByClassName("tab");
  console.log(tabs);
  tabsAry = Array.prototype.slice.call(tabs);
  console.log(tabsAry);

  function tabSwitch() {
    document.getElementsByClassName("active")[0].classList.remove("active");
    this.classList.add("active");

    document.getElementsByClassName("show")[0].classList.remove("show");
    const index = tabsAry.indexOf(this);

    document.getElementsByClassName("content")[index].classList.add("show");
  }

  tabsAry.forEach(function(value) {
    // console.log(value);
    value.addEventListener("click", tabSwitch);
  });
});