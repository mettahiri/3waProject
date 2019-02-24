import {fetch_data} from "./fetch" ;

const onSearchData = (value)=>{
    fetch_data(value);
}

const onFocus =(event)=>{
    if(event.target.value){

        event.target.parentNode.style.transform = "translateY(-170px)";
        document.querySelector(".searchBlock").style.display = "block";

        if (document.querySelector(".searchBlock figure")) {
            document.querySelector(".searchBlock ").innerHTML = "";
        }

        onSearchData(event.target.value);

    } else {

        event.target.parentNode.style.transform = "translateY(0)";
        document.querySelector(".searchBlock").style.display = "none";

        if (document.querySelector(".searchBlock figure")) {

            document.querySelector(".searchBlock ").innerHTML = "";
        }
    }
}


const onHamburgerClick = ()=>{
  var navElements =  document.querySelectorAll(" header nav:first-child ul");
        for(let element of navElements){
            element.classList.toggle("mobile-show");

        }
}
export { onFocus, onHamburgerClick } ;