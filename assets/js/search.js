
const createProductELement = (parent, product)=>{

    let img, figure, figcaption
        figure = document.createElement("figure");
        figure.style.cursor = "pointer";

        img = document.createElement("img");

        img.src = `assets/img/${product['img']}`;
        img.style.width = "100px";

        figcaption = document.createElement("figcaption");
        figcaption.innerHTML = product['titre'];
        figure.appendChild(img);
        figure.appendChild(figcaption);
        parent.appendChild(figure);

        figure.addEventListener("click", () => {
            document.location.href = `index?page=produit&id=${product.id}`;
        }, false);
        
}


const createErrorElement = (parent, product)=> {

    let h3 = document.createElement("h3");
        h3.innerHTML = product.error;
        h3.style.color = "black";
        parent.style.padding = "10px";
        parent.appendChild(h3);

}


const productSearched = (e) => {

    let parent, errorMessage  ;
    let product = e.detail;

        parent = document.querySelector(".searchBlock");
        errorMessage = document.querySelector(".searchBlock h3");

        if(product.error) {
            if (parent) {
                parent.innerHTML ="";
            }

            createErrorElement(parent, product);

        } else {
            if (errorMessage) {
              errorMessage.innerHTML ="";
            }
            createProductELement(parent, product);
            
        }
        

        console.log(e.detail.error)
}

export { productSearched };