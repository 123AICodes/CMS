const nIcon = document.querySelector('.notifications__icon');
const nContent = document.querySelector('.notifications__content');
const mIcon = document.querySelector('.messages__icon');
const mContent = document.querySelector('.messages__content');
const aInfo = document.querySelector('.admin__info');
const aBox = document.querySelector('.admin__box');
const sButton = document.querySelector('.search-btn-small');
const sContainer = document.querySelector('.search__container');


//Preloader
const loader = document.querySelector('.loader');
const main = document.querySelector('.m-prof');
// const mainProfile = document.querySelector('.m-prof');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    main.style.display = 'block';
    main.style.opacity = 1;

  }, 4000);
}

init();

nIcon.addEventListener('click', () => {
  nContent.classList.toggle('active');
  mContent.classList.remove('active');
  aBox.classList.remove('active');
  sContainer.classList.remove('active');
})

mIcon.addEventListener('click', () => {
  mContent.classList.toggle('active');
  nContent.classList.remove('active');
  aBox.classList.remove('active');
  sContainer.classList.remove('active');
})

aInfo.addEventListener('click', () => {
  aBox.classList.toggle('active');
  nContent.classList.remove('active');
  mContent.classList.remove('active');
  sContainer.classList.remove('active');
})

sButton.addEventListener('click', () => {
  sContainer.classList.toggle('active');
  nContent.classList.remove('active');
  mContent.classList.remove('active');
  aBox.classList.remove('active');
})

const topBtn = document.querySelector(".top-btn");
window.onscroll = () => {
  topBtn.classList.toggle("active", window.scrollY > 50);
}