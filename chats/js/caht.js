const form  = document.querySelector(".typing-area"), 
inputfiled  = form.querySelector(".input-field"), 
sendBtn     = form.querySelector("button"),
chatBox     = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}



sendBtn.onclick = ()=> {
    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=> {

        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                
                inputfiled.value = "";

                
                
            }
        } 
        
    }
    // We hate To send the form data through ajax to php
    let formData = new FormData(form); // creating new FormData object
    xhr.send(formData);               //  sending the form data php

    // alert("dadsa");
}

setInterval(()=>{

    // Ajax start
    let xhr = new XMLHttpRequest(); // Creating XML Object
    xhr.open("POST", "php/get-caht.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;    
                
            }
        } 
        
    }
    // We hate To send the form data through ajax to php
    let formData = new FormData(form); // creating new FormData object
    xhr.send(formData);               //  sending the form data php
}, 500); // this function will run frequently after 500ms