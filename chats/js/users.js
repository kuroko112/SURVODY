const searchBar = document.querySelector(".users .search input"),
searchBtn       = document.querySelector(".users .search button"),
userlist        = document.querySelector(".users .user-list");


searchBtn.onclick = ()=> {
    
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value  = "";    
}

searchBar.onkeyup = ()=> {

    let searchTerm = searchBar.value;
    if(searchTerm != "") {
        searchBtn.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;    
                userlist .innerHTML = data;
            }
        } 
        
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

    

}



setInterval(()=>{

    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;    
                if(!searchBar.classList.contains("active")) {
                    userlist .innerHTML = data;
                }
            }
        } 
        
    }
    xhr.send();
}, 500); // this function will run frequently after 500ms