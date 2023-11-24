// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

const details = document.querySelector("#details");
const cardBox = document.querySelector("#cardBox");
const btnCustomer = document.querySelector("#btn-customers");
const btnDashboard = document.querySelector("#btn-dashboard");
details.style.display = "none";

btnDashboard.addEventListener("click", () => {
  cardBox.style.display = "";
  details.style.display = "none";
});

btnCustomer.addEventListener("click", () => {
  details.style.display = "unset";
  cardBox.style.display = "none";
});
