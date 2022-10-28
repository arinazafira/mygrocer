
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    
    <style>
      body 
    {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        background-blend-mode: lighten;
        background-color: lemonchiffon;
    } 

     .header
     {
        padding:0px;
        text-align: center;
        background-color: maroon;
        
     }
     
     .navbar 
    {
        overflow: hidden;
        background-color: maroon;
        position: sticky;
        position: -webkit-sticky;
        top: 0;
        font-family:"Times New Roman", Times, serif;
    }

  
     .navbar a 
    {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 15px;
        text-decoration: none;
    }

     .navbar a:hover 
    {
        background-color: lightgrey;
        color: black;
    }
 
     .navbar a:active
    {
       background-color: gray;
       color: white;
    }
    
    .search-container
    {
        float: right;
    }
    
    .form
        {
        text-align: center;
        }
    
    </style>
    <body>
        
            <div class="header">
       <img src="product-images/headerMyGrocer.PNG">
    </div>
    <div class="navbar">
        <a href="index.html" class="left">Home</a>
        <a href="freshmarket.html" class="left">Fresh Market</a>    
        <a href="foodcupboard.html" class="left">Food Cupboard</a>
        <a href="chilled&frozen.html" class="left">Chilled & Frozen</a>
        <a href="beverages.html" class="left">Beverages</a>    
        <a href="bakery.html" class="left">Bakery</a>
    
         <div class="search-container">
            
            <form action="">
            
            <a href = "cart.php">My Cart</a>
                
            <a href = "login.html">Login</a>
                
            </form>
        </div>
        </div>
     <br> <br><br>
     
    <div class="form" >
<form action="" method="post">  
Search: <input type="text" name="term" />
<input type="submit" value="Submit" />  
</form>  
</body>

<?php
             $con = mysqli_connect("localhost","id17136481_gnett","B|8=QB@SpJQlHtAQ","id17136481_mygrocery");
    
if (!empty($_REQUEST['term'])) {

$term = mysqli_real_escape_string($con, $_REQUEST['term']);     

$sql = "SELECT * FROM tblproduct WHERE name LIKE '%".$term."%'"; 
$r_query = mysqli_query($con, $sql); 

while ($row = mysqli_fetch_array($r_query))
{
echo '<br />Id: ' .$row['id'];  
echo '<br /> Name: ' .$row['name'];  
echo '<br /> Code: '.$row['code'];  
echo '<br /> Price: '.$row['price'];   
echo '<br/><br/>';

}
}
?>