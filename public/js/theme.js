//Website dark/light theme

const themeBtn = document.querySelector(".theme-btn");
themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("light-theme");
    themeBtn.classList.toggle("sun");
    localStorage.setItem("saved-theme", getCurrentTheme());
    localStorage.setItem("saved-icon", getCurrentIcon());
});

const getCurrentTheme = () =>
    document.body.classList.contains("light-theme") ? "light" : "dark";
const getCurrentIcon = () =>
    themeBtn.classList.contains("moon") ? "moon" : "sun";
const savedTheme = localStorage.getItem("saved-theme");
const savedIcon = localStorage.getItem("saved-icon");

if (savedTheme) {
    document.body.classList[savedTheme === "light" ? "add" : "remove"](
        "light-theme"
    );
    themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
}
