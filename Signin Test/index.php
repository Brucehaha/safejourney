<?php
    
     $link = mysqli_connect("localhost", "cl56-henningdb", "KW/Cedw9x", "cl56-henningdb");
    
    if(mysqli_connect_error()) {
        
     die("Cannot connect to Database");
    
    }
    

   
   /* $sql = "INSERT INTO users (name, email, password)
VALUES ('Apple', 'apple0913@hotmail.com', 'PARThouse910913')";

if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

$query="UPDATE `users` SET `name`='Chloe' WHERE `id`=2";
if(mysqli_query($link, $query)){

   echo "Name changed";
}else{
    
    echo "Error:".$query."<br />". mysqli_error($link);

};  
   
mysqli_close($link);*/
     
     //$query = "SELECT * FROM users";
     
//$query="UPDATE `users` SET `name`='Ian O\'Oliv' WHERE `name`='Apple' Limit 1";

$name = "Ian O'Oliv";
$query="select `name` FROM users WHERE name = '".mysqli_real_escape_string($link, $name)."'";

if($result = mysqli_query($link, $query)){
   
   echo mysqli_num_rows($result);
   
   while ($row = mysqli_fetch_array($result)) {
   
   print_r($row);
   }  
}else{
    
   echo "Error:".$query."<br />". mysqli_error($link);

};  

     
?>