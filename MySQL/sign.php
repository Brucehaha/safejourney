<?php     
   
        $email = $_POST['email'];
        $password=$_POST['password'];
  
     	if($_POST['submit']){
    		
    		if(!$email){
    			$error.="Please enter your Email";
    		} else {
    		     //remove all illegal characters from email 
    		    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    		    //check the email
    		    IF (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE){
    		    		 
    		    	$error.= "Please enter a valid email address";
    		    
    		    }else{
    		       
    		       //echo " email is valid<br />";
    		       
    		    }
    		
    		}
    		if(!$password) {
    		
    		  	$error.="Please enter your password";
    		
    		} else{
    			
    			if(strlen($password)<8) {
    			
    				$error.="Please enter a password with at least 8 chararcters";
    			
    			}
    			if(preg_match('`[A-Z]`', $password)) {
    			
    				$error.="Please include at least one capital in your password";
    			
    			}
    		
    		}
    		if($error){
    		
    			echo "There were error(s) in you signup details:".$error;
    			
    		}else {
			     
				 $link = mysqli_connect("localhost", "cl56-henningdb", "KW/Cedw9x", "cl56-henningdb");
    
				 $query="select `name` FROM users WHERE name = '".mysqli_real_escape_string($link, $email)."'";
				  //run the query
				 $result = mysqli_query($link,$query);
			     $results = mysqli_num_rows($result);
			     if ($results){
			         
			         echo "That's email address is already registered. Do you want to log in?";
			         
			     
			     
			     }
				  
				  

     }	
    			
}
    		
    		
    	


?>


<form method="post">



   			<input type="email" name="email" id="email" />
   			
   			<input type="password" name="password" />
   			
   			<input type="submit" name="submit" value="Sign Up" />
   		
</form>