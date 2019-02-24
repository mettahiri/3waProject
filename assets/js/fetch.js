const fetch_data = (value) => {

    fetch(`index?page=search&searching=${value}`)
    .then((result) => result.json() )
    .then(data => {
        for(let searched of data){
            let event = new CustomEvent("productSearched", {
              detail : searched
            });
            document.dispatchEvent(event);
        }
    })

}

export { fetch_data } ;