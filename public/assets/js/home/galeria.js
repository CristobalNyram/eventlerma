const zero = document.querySelectorAll(".reze");

zero.forEach((reze) => {
    reze.addEventListener("click", () => {
        removeActiveClasses();
        reze.classList.add("active");
    });
});

const removeActiveClasses = () => {
    zero.forEach((reze) => {
        reze.classList.remove("active");
    });
};