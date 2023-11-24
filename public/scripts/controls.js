document.querySelector(".cartBtn").addEventListener("click", () => {
  document.querySelector(".cart-list").style.right = "0";
});

document.querySelector(".cart-exit").addEventListener("click", () => {
  document.querySelector(".cart-list").style.right = "-100%";
});

document.querySelector(".orderBtn").addEventListener("click", () => {
  document.querySelector(".order-list").style.right = "0";
});

document.querySelector(".order-exit").addEventListener("click", () => {
  document.querySelector(".order-list").style.right = "-100%";
});

const Btn = document.querySelectorAll(".Btn");
const nav = document.querySelector("nav");
const navlist = document.querySelector(".nav-lists");
const menuBtn = document.querySelector(".burger-btn");

Btn.forEach((button) => {
  button.addEventListener("click", () => {
    Btn.forEach((btn) => {
      btn.classList.remove("toggleActive");
    });

    button.classList.add("toggleActive");
    if (navlist.style.left === "0") {
      navlist.style.left = "0";
    } else {
      navlist.style.left = "-100%";
    }
  });
});

window.addEventListener("scroll", () => {
  if (this.window.scrollY > 50) {
    nav.style.background = "#ecc1a1";
  } else {
    nav.style.background = "transparent";
  }
});

menuBtn.addEventListener("click", () => {
  if (navlist.style.left === "-100%") {
    navlist.style.left = "0";
  } else {
    navlist.style.left = "-100%";
  }
});
