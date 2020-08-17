document.addEventListener('DOMContentLoaded', () => {
  const tabTriggers = document.querySelectorAll('.tab');
  const tabTargets = document.querySelectorAll('.content');

  for (let i = 0; i < tabTriggers.length; i++) {
      tabTriggers[i].addEventListener('click', (e) => {
          let currentMenu = e.currentTarget;
          let currentContent = document.getElementById(currentMenu.dataset.id);

          for (let i = 0; i < tabTriggers.length; i++) {
              tabTriggers[i].classList.remove('active');
          }
          currentMenu.classList.add('active');

          for (let i = 0; i < tabTargets.length; i++) {
              tabTargets[i].classList.remove('show');
          }
          if(currentContent !== null) {
              currentContent.classList.add('show');
          }
      });
  }
});
