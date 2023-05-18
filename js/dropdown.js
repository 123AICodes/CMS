const tabelEllBtn = document.querySelector(".tbl-btn");
const eventEllBtn = document.querySelector(".evt-btn");
const tableDropdown = document.querySelector(".tbl-dropdown");
const eventDropdown = document.querySelector(".evt-dropdown");
const closeTabelDropdown = document.querySelector(".tbl-dropdown .close");
const closeEventDropdown = document.querySelector(".evt-dropdown .close");

// table action
// const actionBtn = document.querySelectorAll(".action-btn");
// const actionContainer = document.querySelectorAll(".action__container");
// const closeActionContainer = document.querySelectorAll(".action__container .close");


// const removeActiveClass = () => {
//   actionContainer.forEach(container => {
//     container.classList.remove('active');
//   })
// }


// closeActionContainer.forEach(closeBtn => {
//   closeBtn.addEventListener("click", () => {
//     removeActiveClass();
//   })
// })

// actionBtn.forEach((btn) => {
//   btn.addEventListener('click', () => {
//     // removeActiveClass();
//     actionContainer.classList.toggle('active');
//   })
// })



// table
tabelEllBtn.addEventListener("click", () => {
  tableDropdown.classList.toggle("active");
  eventDropdown.classList.remove("active");
  removeActiveClass();
});
closeTabelDropdown.addEventListener("click", () => {
  tableDropdown.classList.remove("active");
})
// event
eventEllBtn.addEventListener("click", () => {
  eventDropdown.classList.toggle("active");
  tableDropdown.classList.remove("active");
});
closeEventDropdown.addEventListener("click", () => {
  eventDropdown.classList.remove("active");
})