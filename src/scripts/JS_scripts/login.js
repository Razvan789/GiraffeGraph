const registerButtons = document.querySelectorAll("[data-function]");
const loginForm = document.querySelector("[data-form=login]");
const registerForm = document.querySelector("[data-form=register]");
const loginText = document.querySelector("[data-text=login]");
for (const button of registerButtons) {
    button.addEventListener("click", (e) => {
        loginForm.classList.toggle("d-none");
        registerForm.classList.toggle("d-none");
        loginText.classList.toggle("d-none");
    });
}