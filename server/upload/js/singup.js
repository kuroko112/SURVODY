const form  = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"), 
ErorrText   = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = ()=> {
    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=> {

        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success" ) {

                   location.href = "http://localhost/SURVODY/my-profile-feed.php";

                } else {
                    
                    ErorrText.textContent   = data;
                    ErorrText.style.display = "block";
                    
                    
                }
            }
        } 
        
    }
    // We hate To send the form data through ajax to php
    let formData = new FormData(form); // creating new FormData object
    xhr.send(formData);               //  sending the form data php

    

}