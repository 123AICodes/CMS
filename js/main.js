const mainWrapper = document.querySelector(".main__wrapper");
const openNavButton = document.querySelector(".open-btn");
const closeNavButton = document.querySelector(".close-btn");
const navLink = document.querySelectorAll(".nav-item");

const notificationsButton = document.querySelector(".notifications__icon");
const notificationsWrapper = document.querySelector(".notifications__content");
const messagesButton = document.querySelector(".messages__icon");
const messagesWrapper = document.querySelector(".messages__content");
const adminButton = document.querySelector(".admin__info");
const adminWrapper = document.querySelector(".admin__box");
const searchWrapper = document.querySelector(".search__container");
const searchButton = document.querySelector(".search-btn-small");

const mainWrapperBox = document.querySelector(".main__wrapper");
const openNavBtn = document.querySelector(".open-hd-btn");
const closeNavBtn = document.querySelector(".close-hd-btn");

//Preloader
const loader = document.querySelector('.loader');
const main = document.querySelector('.main__wrapper');
// const mainProfile = document.querySelector('.m-prof');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    main.style.display = 'grid';
    main.style.opacity = 1;

  }, 4000);
}

init();

// close
closeNavButton.addEventListener("click", () => {
  mainWrapper.classList.add("shrink");
  closeNavButton.style.display = "none";
  openNavButton.style.display = "inline-block";
})
// open
openNavButton.addEventListener("click", () => {
  mainWrapper.classList.remove("shrink");
  openNavButton.style.display = "none";
  closeNavButton.style.display = "inline-block";
});
// navlinks
const removeActiveClass = () => {
  navLink.forEach(item => {
    item.classList.remove('active');
  })
}
function activeClass() {
  navLink.forEach(item => {
    item.addEventListener('click', () => {
      removeActiveClass();
      item.classList.add('active');
    });
  });
}
activeClass();

// notifications
notificationsButton.addEventListener("click", () => {
  notificationsWrapper.classList.toggle("active");
  messagesWrapper.classList.remove("active");
  adminWrapper.classList.remove("active");
  searchWrapper.classList.remove("active");
})
// messages
messagesButton.addEventListener("click", () => {
  messagesWrapper.classList.toggle("active");
  notificationsWrapper.classList.remove("active");
  adminWrapper.classList.remove("active");
  searchWrapper.classList.remove("active");
})
// admin account
adminButton.addEventListener("click", () => {
  adminWrapper.classList.toggle("active");
  notificationsWrapper.classList.remove("active");
  messagesWrapper.classList.remove("active");
  searchWrapper.classList.remove("active");
})
// search
searchButton.addEventListener("click", () => {
  searchWrapper.classList.toggle("active");
  notificationsWrapper.classList.remove("active");
  messagesWrapper.classList.remove("active");
  adminWrapper.classList.remove("active");
})

// main wrapper
openNavBtn.addEventListener("click", () => {
  mainWrapperBox.classList.add("active");
  openNavBtn.style.display = "none";
  closeNavBtn.style.display = "inline-block";
})
closeNavBtn.addEventListener("click", () => {
  mainWrapperBox.classList.remove("active");
  closeNavBtn.style.display = "none";
  openNavBtn.style.display = "inline-block";
})

const topBtn = document.querySelector(".top-btn");
window.onscroll = () => {
  topBtn.classList.toggle("active", window.scrollY > 250);
}

// loadmore
let loadMoreButton = document.querySelector('.load-more');
let currentItem = 2;

loadMoreButton.onclick = () => {
  let cards = [...document.querySelectorAll('.card__container .card')];
  for (var i = currentItem; i < currentItem + 2; i++) {
    cards[i].style.display = 'inline-block';
  }
  currentItem += 2;
  if (currentItem >= cards.length) {
    loadMoreButton.style.display = 'none';
  }
}
