import { onFocus, onHamburgerClick } from "./events";
import { productSearched } from "./search";

document.addEventListener("DOMContentLoaded",()=>{
    if (document.querySelector(".search")) {

        if (window.location.href == "index?")
            document.querySelector(".search input").focus();
        document.addEventListener("productSearched", productSearched);

        document.querySelector(".search input")
            .addEventListener("keyup", onFocus);
    }

    document.querySelector(".fa-bars")
            .addEventListener("click",onHamburgerClick);

})