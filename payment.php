<html>

<head>
      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
    
<style>
    
body
{
    background-color: lightgoldenrodyellow;
    font-family: Arial;
    font-size: 17px;
    padding: 8px;
}
    
.wrap   /*big box*/
{      
  width: 75%;
  max-width: 960px;
  margin: 0 auto;
  padding: 0;
  margin-bottom: 5px;
}

.projTitle    /*position of checkout*/
{         
  font-family: Arial, Helvetica, sans-serif;
  font-family:cursive;
  font-weight: bold;
  text-align: center;
  font-size: 35px;
  padding: 15px 15px;
  border-bottom: 1px solid black;
  letter-spacing: 3px;
}

* 
{
  box-sizing: border-box;
}

.row  
{
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}


.column 
{
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.column
{
  padding: 0 16px;
}

input[type=text] 
{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

label 
{
  margin-bottom: 10px;
  display: block;
}

.icon-container 
{
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
  width: .85em;
  display: flex;
  justify-content: center;
  margin-right: auto;
  margin-left: auto;
}

.btn 
{
  background-color: lightcoral;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  color: black;
  font-weight: bold;
}

.btn:hover 
{
  background-color: lightgray;
}

hr 
{
  border: 1px solid black;
    
}

span.price 
{
  float: right;
  color: grey;
}

/* make the card column go on top) */
@media (max-width: 800px) 
{
  .row 
  {
    flex-direction: column;
  }

}
        

    </style>
    
    <body>
        
        <div class="wrap">
       <h1 class="projTitle">Payment</h1>

            <div class="row">
            <div class="column"> 
             <br>   
            <h3 align = "center"><b>Here is Your Biling Address</b></h3>
            <br>
            <label for="fname"> Full Name :<br> 
            <?php echo $_POST["firstname"]; ?></label>
            
            <label for="email"> Email : 
            <br><?php echo $_POST["email"]; ?></label>
       
            <label for="adr"> Address   : 
            <br><?php echo $_POST["address"]; ?></label>

            <label for="city">  City    : 
            <br><?php echo $_POST["city"]; ?></label>
                
            <label for="state"> State    : 
            <br><?php echo $_POST["state"]; ?></label>
       
            <label for="zip"> Zip    : 
            <br><?php echo $_POST["zip"]; ?></label>
          
            </div>
          
        
         <div class="column">
            <br>
            <h3 align = "center"><b>Here is Your Card Details</b></h3><br>
            <label for="cardName">Name on Card : 
            <br><?php echo $_POST["cardName"]; ?></label>
         
            <label for="cardNumber">Credit Number : 
            <br><?php echo $_POST["cardNumber"]; ?></label>
       
            <label for="expMonth">Expiry Month : 
            <br><?php echo $_POST["expMonth"]; ?></label>
  
            <label for="expYear">Expiry Year : 
            <br><?php echo $_POST["expYear"]; ?></label>
   
            <label for="cvv">CVV : 
            <br><?php echo $_POST["cvv"]; ?></label>
    
            </div>
            </div>
        
        <br><hr>
        
        
<!--- database --->
        

                    
            <?php
              $servername = "localhost";
              $username = "id17136481_gnett";
              $password = "B|8=QB@SpJQlHtAQ";
              $dbname = "id17136481_mygrocery";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO billing(name, email, city, state, zip)VALUES('$_POST[firstname]','$_POST[email]','$_POST[city]','$_POST[state]','$_POST[zip]')";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    $sql2 = "INSERT INTO payment(name, creditNumber, expMonth, expYear, cvv)VALUES('$_POST[cardName]','$_POST[cardNumber]','$_POST[expMonth]','$_POST[expYear]','$_POST[cvv]')";
    $conn->exec($sql2);

$conn = null;
?>        
            <br>

</div>
        
    </body>
</html>
