const itemList = document.getElementById("items");
const filter = document.getElementById("filter");

//the listen typing event
filter.addEventListener("keyup", filterItems);

function filterItems(e){
    // convert text to lowercase
    const text = e.target.value.toLowerCase();
    //Get lis
    let items = itemList.getElementsByTagName("li");
    //Convert to an array
    Array.from(items).forEach(function(item){
        const itemName = item.firstChild.textContent;
        if(itemName.toLowerCase().indexOf(text) != -1){
            item.style.display = "block";
        }
        else{
            item.style.display = "none";
        }
    })

}

