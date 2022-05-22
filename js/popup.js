const popups = document.querySelectorAll(".popup");
const overlay = document.querySelector(".overlay");
const blogButtons = document.querySelectorAll(".blogs__actionBtn");

blogButtons.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    popups[index].style.display = "block";
    overlay.style.display = "block";
  });
});

overlay.addEventListener("click", () => {
  popups.forEach((popup) => (popup.style.display = "none"));
  overlay.style.display = "none";
});
