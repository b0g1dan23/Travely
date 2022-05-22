const fixedAdmin = document.querySelector(".admin__side");
let adminContent = document.querySelector(".admin__content");
const sidebarWidth = fixedAdmin.getBoundingClientRect().width;
window.addEventListener("resize", resizeContent);
window.addEventListener("load", resizeContent);
function resizeContent() {
  let width = document.documentElement.clientWidth - sidebarWidth;
  adminContent.style.width = `${width}px`;
}
