"use strict";

let spanAdults = document.querySelector("#dropdown_span-right--adults");
let spanChildren = document.querySelector("#dropdown_span-right--children");
let spanRooms = document.querySelector("#dropdown_span-right--rooms");

let updateAdults = document.querySelector("#updateAdults");
let updateChildren = document.querySelector("#updateChildren");
let updateRooms = document.querySelector("#updateRooms");

let minimumAdults = spanAdults.textContent;
let minimumChildren = spanChildren.textContent;
let minimumRooms = spanRooms.textContent;

export function addValues(btn) {
  btn.addEventListener("click", () => {
    if (
      btn.children[0].classList.contains("fa-plus") &&
      spanAdults.textContent > minimumAdults - 1 &&
      btn.children[0].classList.contains("dropdown-adults")
    ) {
      spanAdults.textContent++;
      updateAdults.textContent++;
    }
    if (
      btn.children[0].classList.contains("fa-minus") &&
      spanAdults.textContent > minimumAdults &&
      btn.children[0].classList.contains("dropdown-adults")
    ) {
      spanAdults.textContent--;
      updateAdults.textContent--;
    }
    if (
      btn.children[0].classList.contains("fa-plus") &&
      spanChildren.textContent > minimumChildren - 1 &&
      btn.children[0].classList.contains("dropdown-children")
    ) {
      spanChildren.textContent++;
      updateChildren.textContent++;
    }
    if (
      btn.children[0].classList.contains("fa-minus") &&
      spanChildren.textContent > minimumChildren &&
      btn.children[0].classList.contains("dropdown-children")
    ) {
      spanChildren.textContent--;
      updateChildren.textContent--;
    }
    if (
      btn.children[0].classList.contains("fa-plus") &&
      spanRooms.textContent > minimumRooms - 1 &&
      btn.children[0].classList.contains("dropdown-rooms")
    ) {
      spanRooms.textContent++;
      updateRooms.textContent++;
    }
    if (
      btn.children[0].classList.contains("fa-minus") &&
      spanRooms.textContent > minimumRooms &&
      btn.children[0].classList.contains("dropdown-rooms")
    ) {
      spanRooms.textContent--;
      updateRooms.textContent--;
    }
  });
}
const options = [
  "Default Order",
  "Price - Low to High",
  "Price - Hight to Low",
  "Quadrature - Low to High",
  "Quadrature - High to Low",
];
const sortContainer = document.querySelector(".rooms__sort");

var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf("/") + 1); // Take name of file
export let makeItActive = "";
switch (filename) {
  case "index":
    makeItActive = "Home";
    break;
  case "about":
    makeItActive = "About us";
    break;
  case "blog":
    makeItActive = "Blog";
    break;
  case "contact":
    makeItActive = "Contact";
    break;
  case "rooms":
    makeItActive = "Rooms";
    options.forEach((option) => {
      let html = `<li class="dropdown_li">
      <a href="#" class="dropdown_span dropdown_a rooms__sortic" data-sort-this>${option}</a>
    </li>`;
      sortContainer.insertAdjacentHTML("beforeend", html);
    });
    break;
}
