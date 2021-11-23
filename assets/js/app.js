const menu = document.querySelector("#menu");
const navbar = document.querySelector(".navbar");
const navItems = document.querySelectorAll(".navbar a");

menu.addEventListener("click", () => {
    navbar.classList.toggle("nav-toggle");
    menu.classList.toggle("active");
});

navItems.forEach(item => {
    item.addEventListener("click", () => {
        navbar.classList.remove("nav-toggle");
        menu.classList.remove("active");
    });
});
