const BASE_URL = window.location.origin;
// class
const preloader = document.querySelector(".lds-ring");
const hamburger = document.querySelector(".hamburger");
const mainMenu = document.querySelector(".main-menu");
const topArrow = document.querySelector(".top-arrow");

if (sessionStorage.getItem("mainMenu") === "visible") {
    hamburger.classList.toggle("change");
    mainMenu.classList.toggle("main-menu-active");
}

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("change");
    mainMenu.classList.toggle("main-menu-active");
    if (sessionStorage.getItem("mainMenu") === "visible") {
        sessionStorage.setItem("mainMenu", "invisible");
    } else {
        sessionStorage.setItem("mainMenu", "visible");
    }
});

[...$(".notes-element p")].forEach((elem) => {
    if (elem.innerText.length > 140) {
        elem.innerTextSave = elem.innerText;
        elem.innerText = elem.innerText.slice(0, 140);
        elem.innerText = elem.innerText + " ...";
    }
});

[...$(".notes-element")].forEach((item) => {
    const colors = ["#ff0", "#ffb0b0", "#f58abb", "#b38cff", "#919fff", "#00b8ff", "#6cfff1", "#68ff9e", "#ffd400"];
    const randomNumber = Math.round(Math.random() * 9);

    $(item).css({ background: colors[randomNumber] });

    item.addEventListener("click", (elem) => {
        $("#login-form").modal({
            fadeDuration: 100,
        });

        $("body").css({ "overflow-y": "scroll" });

        $("#login-form").text(item.children[0].innerTextSave);
    });
});
