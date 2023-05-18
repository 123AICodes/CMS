//Preloader
const loader = document.querySelector('.loader');
const main = document.querySelector('.main__container');
// const mainProfile = document.querySelector('.m-prof');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    main.style.display = 'flex';
    main.style.opacity = 1;

  }, 4000);
}

init();

const topBtn = document.querySelector(".top-btn");
window.onscroll = () => {
  topBtn.classList.toggle("active", window.scrollY > 50);
}
