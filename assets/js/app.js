const menu = document.querySelector("#menu");
const navbar = document.querySelector(".navbar");
const navItems = document.querySelectorAll(".navbar a");

const signInBtn = document.querySelector(".signIn-btn");
const signUpBtn = document.querySelector(".signUp-btn");
const formBox = document.querySelector(".form-box");
const modalShadow = document.querySelector(".modal-shadow");

const openBtn = document.querySelector(".modal-open");
const closeBtn = document.querySelector(".close-btn");

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

openBtn.addEventListener("click", () => {
    modalShadow.style.opacity = "1";
    modalShadow.style.pointerEvents = "all";

    document.body.style.overflow = "hidden";
});
closeBtn.addEventListener("click", () => {
    modalShadow.style.opacity = "0";
    modalShadow.style.pointerEvents = "none";

    document.body.style.overflow = "auto";
});

signUpBtn.addEventListener("click", () => {
    formBox.classList.add("active");
    modalShadow.classList.add("active");
});

signInBtn.addEventListener("click", () => {
    formBox.classList.remove("active");
    modalShadow.classList.remove("active");
});
