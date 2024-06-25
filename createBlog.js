function createB(name,place,desc){
   let nameBox = document.createElement("div");//for creating name box
   nameBox.innerHTML = name;
   nameBox.classList.add("name-review");
   let placeBox = document.createElement("div");//for creating the place box
   placeBox.innerHTML = place;
   placeBox.classList.add("place-review");
   let descBox = document.createElement("div");//for creating the desc box
   descBox.innerHTML = desc;
   descBox.classList.add("desc-review");
   let revBox = document.createElement("div");
   revBox.classList.add("review")
   let bodyBox = document.createElement("div");
   bodyBox.classList.add("body-review");
   bodyBox.appendChild(nameBox);
   bodyBox.appendChild(placeBox);
   bodyBox.appendChild(descBox);
   let reviews = document.getElementById("reviews");
   revBox.appendChild(bodyBox);
   reviews.appendChild(revBox);
   
}

let redirect = document.getElementById("redirectB");
redirect.addEventListener("click",()=>{
    window.location.href="editor.php";
})

function receiveData(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "config files/action.php",true);
    xhr.onload = ()=>{
        if(xhr.status == 200 && xhr.readyState == 4){
            const data = JSON.parse(xhr.response);
            
            
            for(let i = data.length - 1;i>=0;i--){
                createB(data[i].Name,data[i].Country,data[i].Desc);
            }
        }
    }
    xhr.send();
}

receiveData();