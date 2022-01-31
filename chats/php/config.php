<?php 

    @$conn = mysqli_connect("localhost", "root", "", "survody_native");
    if(!$conn) {
        echo "DataBase Connected ". mysqli_connect_errno();
    } 


?>