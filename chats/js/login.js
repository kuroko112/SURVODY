const form  = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"), 
ErorrText   = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = ()=> {
    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=> {

        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                
                // console.log(data);
                
                if(data == "success" ) {

                   location.href = "users.php";

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