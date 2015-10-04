<!DOCTYPE html>
<html>
   <head>
      <title>Silverado - Booking page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">
      <style>
            <?php require_once('CSS/global.css'); ?>
            <?php require_once('CSS/parBookingPage.css'); ?>
      </style>
      <script src="app/views/JS/jquery-2.1.4.min.js"></script>
      <script src="app/views/JS/parBookingPage.js"></script>
   </head>
   <body>
      <div id="warpper">
         <!-- header + warpper !-->
         <?php require_once('header+nav.php'); ?>
         <!-- content !-->
         <form id="book" action='http://titan.csit.rmit.edu.au/~e54061/wp/testbooking.php' onsubmit="return validateForm()" method="post">
            <fieldset>
               <legend class="book">Booking form</legend>
               <br/>
               <div id=warningMessage>Moive, day and time pre-selected. If you want to change the details, click <a href="bookingPage.php">here</a></div>
               <!-- ticket type selection !-->
               <table class="Movie_information">
                  <tr>
                     <th>Movie Name</th>
                     <td>
                        <select id="movieI" name="movie"  required readonly>
                            <?php
                                if($_POST["moive"]=="AC"){
                                    echo '<option value="AC">Mission Impossible: Rogue Nation</option>';
                                }
                                if($_POST["moive"]=="CH"){
                                    echo '<option value="CH">Inside Out</option>';
                                }
                                if($_POST["moive"]=="AF"){
                                    echo '<option value="AF">Girlhood</option>';
                                }
                                if($_POST["moive"]=="RC"){
                                    echo '<option value="RC">Train Wreck</option>';
                                }
                            ?>
                        </select>
                     </td>
                  </tr>
                  <tr class="day">
                     <!-- show only when previous selected vaule is not empty !-->
                     <th>Session Day</th>
                     <td>
                        <select id="dayI" name="day" required readonly>
                           <?php
                                echo '<option value="'.$_POST["day"].'">'. $_POST["day"].'</option>';
                            ?>
                        </select>
                     </td>
                  </tr>
                  <tr class="time">
                     <!-- show only when previous selected vaule is not empty !-->
                     <th>Session Time</th>
                     <td>
                        <select id="timeI" name="time" required readonly>
                            <?php
                                echo '<option value="'.$_POST["time"].'">'. $_POST["time"].'</option>';
                            ?>
                        </select>
                     </td>
                  </tr>
               </table>
               <table class="Tickets_and_display_price">
                  <tr>
                     <th>Ticket type</th>
                     <th>Quanity</th>
                     <th>Subtotal Price</th>
                  </tr>
                  <tr>
                     <td>Adult</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="SA" min="0" max="10" value="0" onchange="calculatePrice(this,'sub1')"/>
                     </td>
                     <td id="sub1">0.00</td>
                  </tr>
                  <tr>
                     <td>Concession</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="SP" min="0" max="10" value="0" onchange="calculatePrice(this,'sub2')"/>
                     </td>
                     <td id="sub2" >0.00</td>
                  </tr>
                  <tr>
                     <td>Child</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="SC" min="0" max="10" value="0" onchange="calculatePrice(this,'sub3')"/>
                     </td>
                     <td id="sub3" >0.00</td>
                  </tr>
                  <tr>
                     <td>First Class Adult</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="FA" min="0" max="10" value="0" onchange="calculatePrice(this,'sub4')"/>
                     </td>
                     <td id="sub4" >0.00</td>
                  </tr>
                  <tr>
                     <td>First Class Child</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="FC" min="0" max="10" value="0" onchange="calculatePrice(this,'sub5')"/>
                     </td>
                     <td id="sub5" >0.00</td>
                  </tr>
                  <tr>
                     <td>Beanbag - 1 Person</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="B1" min="0" max="10" value="0" onchange="calculatePrice(this,'sub6')"/>
                     </td>
                     <td id="sub6" >0.00</td>
                  </tr>
                  <tr>
                     <td>Beanbag - 2 People</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="B2" min="0" max="10" value="0" onchange="calculatePrice(this,'sub7')"/>
                     </td>
                     <td id="sub7" >0.00</td>
                  </tr>
                  <tr>
                     <td>Beanbag - 3 children</td>
                     <td>
                        <span class="price">0</span>
                        <span class="x">X</span>
                        <span class="quanity">0</span>
                        <input class="silder" type="range" name="B3" min="0" max="10" value="0" onchange="calculatePrice(this,'sub8')"/>
                     </td>
                     <td id="sub8" >0.00</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td id="sum">0.00</td>
                  </tr>
                  <tr>
                     <td colspan="3"><input type="submit" value="Submit" ></td>
                  </tr>
               </table>
            </fieldset>
         </form>
         <!-- footer !-->
         <?php require_once('footer.php'); ?>
      </div>
   </body>
</html>