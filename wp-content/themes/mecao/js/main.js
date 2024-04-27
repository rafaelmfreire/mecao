window.addEventListener("scroll", function (e) {
    var top = document.getElementById("topbar");
    if (document.documentElement.scrollTop > 100 || document.body.scrollTop > window.innerHeight) {
        top.classList.add("hide-bar");
        top.classList.remove("show-bar");
    } else {
        top.classList.add("show-bar");
        top.classList.remove("hide-bar");
    }
});