<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Form</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Satisfy&display=swap");

      body {
        font-family: "Open Sans", sans-serif;
        background: url("images/forms.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
      }

      h2 {
        font-family: "Satisfy", cursive;
        font-size: 35px;
        margin-left: 35px;
      }
      .section {
        margin-bottom: 15px;
        width: 100%;
        float: left;
        font-size: 20px;
        margin-left: 35px;
      }
      .label {
        float: left;
        margin-right: 10px;
        width: 150px;
      }

      .field {
        float: left;
      }
      #container {
        width: 900px;
      }

      input {
        border: 1px solid black;
      }

      input[type="submit"],
      input[type="reset"] {
        background-color: #8b4513;
        color: #fff;
        border: none;
        padding: 8px 15px;
        text-decoration: none;
        margin: 3px 1px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #8b4513;
        color: #cc7722;
      }
      input[type="reset"]:hover {
        background-color: #8b4513;
        color: #cc7722;
      }
    </style>
    <script type="text/javascript" src="validation.js?v=1"></script>
  </head>
  <body>
      <?php
        include("../../conn.php");
        $userID = NULL;
        session_start();
        if (isset($_SESSION['mySession'])) {
          $username = $_SESSION["mySession"];
          $sql_id = "SELECT * FROM user WHERE username = '$username'";
          $result_id = mysqli_query($con, $sql_id);
          $array = mysqli_fetch_array($result_id);
          $userID = $array['userID'];
      }
    ?>
    <h2>My Galaxy Booking Form</h2>
    <form action="booking_form.php" method="post">
      <?php 
        $inputData = "<input type='number' name='userID' value='$userID' hidden>";
        echo $inputData;
      ?>
      <div id="container">
        <div class="section">
          <div class="label">Name</div>
          <div class="field">
            : <input type="text" name="name" required="required" />
          </div>
        </div>
        <div class="section">
          <div class="label">Phone Number</div>
          <div class="field">
            :
            <input
              type="tel"
              id="telephone"
              name="phone_num"
              onfocusout="phone_number()"
              required="required"
            />
          </div>
        </div>
        <div class="section">
          <div class="label">Email Address</div>
          <div class="field">
            : <input type="email" name="email_address" required="required" />
          </div>
        </div>
        <div class="section">
          <div class="label">Services</div>
          <div class="field">
            :
            <select name="services" required="required">
              <option value="" selected="true" disabled="disabled">
                Please select
              </option>
              <option value="full grooming">Full Grooming</option>
              <option value="wash & dry">Wash & Dry</option>
              <option value="self-service">Self-Service</option>
              <option value="nail-clipping">Nail-Clipping</option>
            </select>
          </div>
        </div>
        <div class="section">
          <div class="label">Animals</div>
          <div class="field">
            :
            <input
              type="radio"
              name="animals"
              value="Dog"
              required="required"
            />
            Dog
            <input
              type="radio"
              name="animals"
              value="Cats"
              required="required"
            />
            Cat
          </div>
        </div>
        <div class="section">
          <div class="label">Breed</div>
          <div class="field">
            :
            <select name="breed" required="required">
              <option value="" selected="true" disabled="disabled">
                Please select
              </option>
              <option value="large breed">Large Breed</option>
              <option value="medium breed">Medium Breed</option>
              <option value="small breed">Small Breed</option>
            </select>
          </div>
        </div>
        <div class="section">
          <div class="label">Booking Date</div>
          <div class="field">
            :
            <input
              type="date"
              id="booking_date"
              name="booking_date"
              onchange="booking()"
              required
            />
          </div>
        </div>
        <div class="section">
          <div class="label">Booking Time</div>
          <div class="field">
            :
            <input
              type="time"
              id="bookingTime"
              name="booking_time"
              onfocusout="hour()"
              required
            />
          </div>
        </div>
        <div class="section">
          <div class="label">&nbsp;</div>
          <div class="field">
            <input
              type="submit"
              value="Submit"
              onclick="return phone_number()"
            />
            <input type="reset" value="Reset" />
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
