document.addEventListener('turbo:load', function() {
    const burgerButton = document.getElementById("burger-button");
    const burgerIcon = document.getElementById("burger-icon");
    const mobileMenu = document.getElementById("mobile-menu");

    burgerButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        const isHidden = mobileMenu.classList.contains("hidden");
        burgerIcon.src = isHidden ? "images/svg/Burger.svg" : "images/svg/X.svg";
    });
});