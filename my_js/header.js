const burger = document.querySelector(".burger")
const mobileMenu = document.querySelector(".mobile-menu")

const toggleMenu = (e) => {
    mobileMenu.classList.toggle("show")
    burger.classList.toggle("change")
}

burger.addEventListener("click", toggleMenu)