function createB(id,name,desc){
   let nameBox = document.createElement("div");//for creating name box
   nameBox.innerHTML = name;
   nameBox.classList.add("name-review");
   let descBox = document.createElement("div");//for creating the desc box
   descBox.innerHTML = desc;
   descBox.classList.add("desc-review");
   let buttonBox = document.createElement("button");//create a delete button
   buttonBox.innerHTML = "&#128465";
   buttonBox.classList.add("button-rev");
   buttonBox.onclick = ()=>deleteData(id);//adding the function to delete
   let bodyBox = document.createElement("div");//create div to add the name and desc
   bodyBox.classList.add("body-review");
   bodyBox.appendChild(nameBox);
   bodyBox.appendChild(descBox);
   bodyBox.appendChild(buttonBox);
   let revBox = document.createElement("div");//create the box that contains them
   revBox.classList.add("review");
   revBox.appendChild(bodyBox);
   revBox.id = id;
   let reviews = document.getElementById("reviews");//append everything to the html
      reviews.appendChild(revBox);
}


function deleteData(id){//delete function
    const xhr = new XMLHttpRequest();
   
        xhr.open("POST","config files/delete.php",true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");//this ensure the content type to be url encode
        xhr.onreadystatechange = ()=>{//checks if the connection is established
            if(xhr.readyState == 4 && xhr.status == 200){
                let response = JSON.parse(xhr.responseText)
                if(response.success){
                    document.getElementById(id).remove();
                }
                
            }
        }
        let data = `id=${id}`;
        xhr.send(data);//sends the id to the delete.php
}


let redirect = document.getElementById("redirectB");
redirect.addEventListener("click",()=>{
    window.location.href="editor.php";
})

function receiveData(){//to receive data from database
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "config files/getData.php",true);
    xhr.onload = ()=>{
        if(xhr.status == 200 && xhr.readyState == 4){
            const data = JSON.parse(xhr.response);   
            for(let i = data.length - 1;i>=0;i--){
                createB( data[i].ID,data[i].Name,data[i].Desc);
            }
        }
    }
    xhr.send();
}

async function createRandomQuote(){//generate a random breaking bad quote
    const apiUrl = 'https://api.breakingbadquotes.xyz/v1/quotes';//api url to be fetched
    try{
        let response = await fetch(apiUrl);//fetching the api and waiting
    if(!response.ok){
        throw new Error('Failed to get response')
    }
    const data = await response.json();
    let name = data[0].author;
    let desc = data[0].quote;
    let xhr = new XMLHttpRequest();//create ajax to send the data
    xhr.open('POST','config files/insert.php',true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange= ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
        }
    };
        let newData = `username=${encodeURIComponent(name)}
        &desc=${encodeURIComponent(desc)}
        &insert=Publish`;//create data to pass them to the php page
        xhr.send(newData);
        location.reload();//to reload the page after done
    
    
    }
    catch(error){
        console.error(error);
    }
    
}

receiveData();