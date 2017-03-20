<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     
        <link rel="stylesheet" type="text/css" href="normalise.css">

    <title> UAV Control</title>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
   
    
</head>  
    
                                <?php
     
    
     
   
                                $sql= new mysqli('localhost','root', '', 'uav' );

                                if($sql->connect_error)

                                    { die("connection failed:". $sql->connect_error);
                                    }
                                 else 
                                     echo "connection success";
                              /*  $querry1= $sql->query("insert into cur_moist (value) VALUES ($val) ");
                                    if ($querry1!==TRUE)
                                        echo "error";*/
                                  
                                  
                                $querry= $sql->query("select gauge.* from gauge order by timestamp desc limit 1"); #display
                               $querry1= $sql->query("select altitude.* from altitude order by timestamp desc limit 1");    
                                 $querry2= $sql->query("select tilt.* from tilt order by timestamp desc limit 1"); 
                                 $querry3= $sql->query("select tilt.* from tilt order by timestamp desc limit 1"); 
                                     $querry4= $sql->query("select tilt.* from tilt order by timestamp desc limit 1"); 
                                         $querry8= $sql->query("select altitude.* from altitude order by timestamp desc limit 1"); 

                                         $querry9= $sql->query("select gauge.* from gauge order by timestamp desc limit 1"); 

if($querry4==TRUE)
echo"pratik";
                                
  
                                ?>
    
    
    /* php code for artificial horizon */
     
    <style>
        
 .inner
 { position: absolute;
                  
    z-index: -2;
    left: 0px;
    height: 150%;
      max-width: 100%;
    
      
                     
                    
                                        <?php 
                                                    if($querry2!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry2))
                                                                 {
                                                                   $angle= 360-$row["value"];
                                                                     echo "-ms-transform: rotate(".$angle."deg); /* IE 9 */
                                                                    -webkit-transform: rotate(".$angle."deg); /* Chrome, Safari, Opera */
                                                                    transform: rotate(".$angle."deg);";
                                                                 }
                                                                                mysqli_free_result($querry2);
                                                    }
                    
                                                        if($querry1!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry1))
                                                                 {
                                                                     $alt=-57+$row["value"];
                                                                     echo " top:".$alt."px; ";
                                                                 }
                                                                                mysqli_free_result($querry1);
                                                    }
                   
                                        ?>    
 }
          
.middle
        {
         position: absolute;
        z-index: -1;
        left: -357px;
        top: -360px;
             max-width:400%;
            max-height: 400%;



                                        <?php               
                                            if($querry3!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry3))
                                                                 {
                                                                   $angle= 360-$row["value"];
                                                                     echo "-ms-transform: rotate(".$angle."deg); /* IE 9 */
                                                                    -webkit-transform: rotate(".$angle."deg); /* Chrome, Safari, Opera */
                                                                    transform: rotate(".$angle."deg);";
                                                                 }
                                                                                
                                                    }
                                        ?>
        }
    
</style>
    
    
     
    
    
    
    <body class="body">
        
        
<div class="heading">
    

    
    <h1> TELEMETRY DASHBOARD </h1>
        
</div>
    
  <br>
        <br>
        <br>
        
<div class="row row1">   
    
<div class="col-md-4 side-bar">
         
<div class="container">
  
    
    
    
            
  <table class="table">
    <thead>
       
    </thead>
      
      
      
    <tbody>
       
         <?php 
                                                if($querry4!==FALSE)
                                                    {
                       $row2 =mysqli_fetch_array($querry4); $row1 =mysqli_fetch_array($querry8); $row =mysqli_fetch_array($querry9);
                                                                 echo "<h2 style=\"color: #37d037;\"> ROLL :" .$row["value"]."<h2>";
                                                                  echo "<h2 style=\"color: #37d037;\"> PITCH :" .$row1["value"]."<h2>";
                                                                  echo "<h2 style=\"color: #37d037;\">YAW :" .$row2["value"]."<h2>";
                                                                
                                                         mysqli_free_result($querry4);
                                                         mysqli_free_result($querry9);
                                                         mysqli_free_result($querry8);
                                                                           
                                                    }
        ?>
         
    </tbody>
  </table>
</div>

        
    </div>
    
    
    
    
    
    <div class="col-md-4 meter-grid-left">
        <div class="grid-in-L">
           
            <div class="changeL">
                 <img class="inner" src="image/horizon1.png">
                <img class="middle" src="image/outer1.png">
                <img class="outer"  src="image/horizon.png">
            </div>
         
        </div>      
        
    </div>
    
   
    
    
    <div class="col-md-4 ">
        <div class="grid-in">
            <div class="change" >        
                                                    <?php

                                                    if($querry!==FALSE)
                                                    {
                                                        while($row = mysqli_fetch_array($querry))
                                                                 {
                                                                     $angle= 360-$row["value"];
                                                                     echo "<img style=\"-ms-transform: rotate(".$angle."deg);  
                                                                -webkit-transform: rotate(".$angle."deg); 
                                                                transform: rotate(".$angle."deg);\" src=\"image/gaugeFace.png\" > ";
                                                                  
                                                                 }
                                                                                mysqli_free_result($querry);
                                                    }
                                                                    mysqli_close($sql);
                                                        ?>
            </div>
        </div>      

    </div>
</div>    
    
    
    
    </body>
    
     <script>
        
 

     
     
    
</script> 
    
</html>