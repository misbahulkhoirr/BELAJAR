//  FIXNAVBAR
window.onscroll = function () {
  const header = document.querySelector("header");
  const fixNav = header.offsetTop;

  if (window.pageYOffset > fixNav) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};

// HAMBURGER
const hamburger = document.querySelector("#hamburger");
hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-aktiv");
});
