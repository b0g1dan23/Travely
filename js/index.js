"use strict";
import { addValues } from "./functions.js";
import { makeItActive } from "./functions.js";

// Variables
const header = document.querySelector(".header__content");
const numbers = document.querySelectorAll(".number");
const dropdownSearch = document.querySelectorAll(".base_input-button");
const btnAdults = document.querySelectorAll(".dropdown_btn-adults");
const btnChildren = document.querySelectorAll(".dropdown_btn-children");
const btnRooms = document.querySelectorAll(".dropdown_btn-rooms");
const carouselBtns = document.querySelectorAll("[data-carousel-button]");
const sortText = document.querySelector("[data-button-span]");
const sortBtn = document.querySelectorAll(".rooms__sortic");
const numOfSlides = document.querySelectorAll(".rooms__slide").length;
const burgerMenuOpen = document.querySelector(".navigation__burger-open");
const burgerMenuClose = document.querySelector(".navigation__burger-close");
const list = document.querySelector(".navigation__list");
const listItems = document.querySelectorAll(".navigation__listitem");

burgerMenuOpen.addEventListener("click", () => {
  listItems.forEach((item) => {
    item.style.marginRight = "10%";
  });
  list.style.backgroundColor = "#fe5f55";
  burgerMenuOpen.style.display = "none";
  burgerMenuClose.style.display = "block";
});

burgerMenuClose.addEventListener("click", () => {
  listItems.forEach((item) => {
    item.style.marginRight = "-200%";
  });
  list.style.backgroundColor = "transparent";
  burgerMenuOpen.style.display = "contents";
  burgerMenuClose.style.display = "none";
});

btnAdults.forEach(addValues);
btnChildren.forEach(addValues);
btnRooms.forEach(addValues);

// DROPDOWN
dropdownSearch.forEach((search) =>
  search.addEventListener("click", () =>
    search.nextElementSibling.classList.add("show")
  )
);

window.onclick = function (event) {
  if (
    !event.target.matches(".base_input-button") &&
    !event.target.matches(".dropdown_li") &&
    !event.target.matches(".dropdown_span") &&
    !event.target.matches(".dropdown_btn") &&
    !event.target.matches(".dropdown_right")
  ) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
};

// Counter
let time = 5; // Fast at start
numbers.forEach((number) => {
  const increment = () => {
    const targetNumber = number.getAttribute("data-target-number");
    let currentNumber = Number(number.textContent);

    if (currentNumber < targetNumber) {
      number.textContent++;
      if (currentNumber > targetNumber * 0.85) {
        time += 7; // Slow down
      }
      setTimeout(increment, time);
    } else {
      currentNumber = targetNumber;
    }
  };
  increment();
});

// Sticky header
// On scroll, show header
const setHeader = function () {
  if (window.scrollY > 10 && window.innerWidth > 525) {
    header.classList.add("sticky");
    header.classList.remove("ease-out");
  } else {
    header.classList.remove("sticky");
    header.classList.add("ease-out");
  }
};

// Check if scroll is scrollY > 10 on page load
window.addEventListener("load", () => setHeader());
// Check if scroll is scrollY > 10 on page scroll
window.addEventListener("scroll", () => setHeader());

const navLinks = document.querySelectorAll(".navigation__link");
navLinks.forEach((link) =>
  link.textContent == makeItActive
    ? link.classList.add("navigation__link-active")
    : link.classList.remove("navigation__link-active")
);

// Carousel
const showBtns = numOfSlides > 1;
if (!showBtns) {
  carouselBtns.forEach((btn) => (btn.style.display = "none"));
}
carouselBtns.forEach((button) => {
  button.addEventListener("click", () => {
    const offset = button.dataset.carouselButton === "next" ? 1 : -1;
    const slides = button
      .closest("[data-carousel]")
      .querySelector("[data-slides]");
    const activeSlide = slides.querySelector("[data-active]");
    let newIndex = [...slides.children].indexOf(activeSlide) + offset;
    if (newIndex < 0) newIndex = slides.children.length - 1;
    if (newIndex >= slides.children.length) newIndex = 0;

    slides.children[newIndex].dataset.active = true;
    delete activeSlide.dataset.active;
  });
});

const prices = document.querySelectorAll("[data-apartment-price]");
let hotelPrices = [];
for (let i = 0; i < prices.length; i++) {
  hotelPrices[i] = prices[i].textContent;
}

sortBtn.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    let list = document.querySelector(".rooms__box");
    if (btn.textContent === "Price - Low to High") {
      sortListDir(list, "asc", true);
      sortText.textContent = "Price - Low to High";
    } else if (btn.textContent === "Price - Hight to Low") {
      sortListDir(list, "desc", true);
      sortText.textContent = "Price - High to Low";
    } else if (btn.textContent === "Quadrature - Low to High") {
      sortListDir(list, "asc", false);
      sortText.textContent = "Quadrature - Low to High";
    } else if (btn.textContent === "Quadrature - High to Low") {
      sortListDir(list, "desc", false);
      sortText.textContent = "Quadrature - High to Low";
    }
  });
});

function sortListDir(list, dir, price) {
  var i,
    switching,
    item,
    shouldSwitch,
    dir,
    num = [];
  switching = true;
  while (switching) {
    switching = false;
    item = list.querySelectorAll(".rooms__item");
    if (price === true) {
      num = list.querySelectorAll(".rooms__price-span");
    } else {
      num = list.querySelectorAll(".rooms__kvadratura-span");
    }

    for (i = 0; i < item.length - 1; i++) {
      shouldSwitch = false;
      if (dir == "asc") {
        if (Number(num[i].outerText) > Number(num[i + 1].outerText)) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (Number(num[i].outerText) < Number(num[i + 1].outerText)) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      item[i].parentNode.insertBefore(item[i + 1], item[i]);
      switching = true;
    }
  }
}
