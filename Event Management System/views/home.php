<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    

  ?>
<!DOCTYPE html>
<html>
    <head>   
        <title>Home</title>
        <?php include_once('bootstrap.php'); ?>
    </head>
    <body>

        <?php include_once('index_header.php'); ?>

        <main>
           <div class="container pb-5">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">

                    <div class="carousel-item active">
                      <img src="../storage/event_image/event.png" style="height: 500px;" class="d-block w-100" alt="">
                    </div>
                  </div>
                </div>
           </div>

            <div id="about" class="container pt-5 pb-5">
                <div class="pt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">A B O U T &nbsp; U S</h3>
                        </div>
                        <div class="card-body">
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="organizer" class="container pt-5 pb-5">
                <div class="pt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">O R G A N I Z E R</h3>
                        </div>
                        <div class="card-body">
                            <div class="container row">
                                <div class="col-md-4 pb-4">
                                    <div class="card" style="width: 18rem;">
                                      <img style="height: 300px;" src="" class="card-img-top" alt="...">
                                      <div class="card-body text-center">
                                        <h5 class="card-title">Sayma Nasrin</h5>
                                        <p class="card-text">saymanasrin10@gmail.com</p>
                                      </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div id="contact" class="container pt-5 pb-5">
                <div class="pt-5 pb-5">
                    <div class="container d-flex justify-content-center card w-75">
                        <div class="card-header">
                            <h2 class="text-center">C O N T A C T &nbsp; U S</h2>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/message_Controller.php" method="POST" onsubmit="return validate_form()" class="row" name="myForm">

                              <div class="col-12 pb-1">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" onkeyup="checkName()" onblur="checkName()">
                                <span style="color:red" id="err_name"></span>
                              </div>

                              <div class="col-12 pb-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" onkeyup="checkEmail()" onblur="checkEmail()">
                                <span style="color:red" id="err_email"></span>
                              </div>

                              <div class="col-12 pb-1">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="8" onkeyup="checkMessage()" onblur="checkMessage()"></textarea>
                                <span style="color:red" id="err_message"></span>
                              </div>

                              <div class="col-12 pt-2 pb-1 d-flex justify-content-end">
                                <input type="submit" name="submitMessage" id="submit" class="btn btn-primary" value="Submit">
                              </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-5" style="background-color: #251D58;">
                <div class="pt-5 container">
                    <div class="row text-white">
                        <div class="col-md-4">
                            <p></p>
                            <p></p>
                            <p>H#000(5th Floor), Road #12</p>
                            <p>Dhaka, Bangladesh</p>
                        </div>
                        <div class="col-md-4">
                            <h6><u>Company</u></h6>
                            <p></p>
                            <p>About</p>
                            <p>Project</p>
                            <p>Our Team</p>
                            <p>Terms Condition</p>
                            <p>Submit Listing</p>
                        </div>
                        <div class="col-md-4">
                            <h6><u>Quick Links</u></h6>
                            <p></p>
                            <p>Rentals</p>
                            <p>Sales</p>
                            <p>Contact</p>
                            <p>Our Blog</p>
                        </div>
                    </div>
                </div>
                <div class="text-center text-white pt-5 pb-3">
                    <p>Copyright 2021 All Rights Reserved</p>
                </div>
            </div>

            <script>
            function validate_form()
            {

                var valid = true;
                document.getElementById("err_name").innerHTML = "";
                var name=document.forms["myForm"]["name"].value;

                document.getElementById("err_message").innerHTML = "";
                var message=document.forms["myForm"]["message"].value;

                document.getElementById("err_email").innerHTML = "";
                var email=document.forms["myForm"]["email"].value;

                var atposition  = email.indexOf("@");  
                var dotposition = email.lastIndexOf(".");  
                
                if(name == "" || name == null)
                {
                    
                    document.getElementById("err_name").innerHTML="*Name Required";
                    valid = false;
                }
                else if(!isNaN(name))
                {
                    
                    document.getElementById("err_name").innerHTML="*You Cannot Input Numeric Value";
                    valid = false;
                }
                if(message == "" || message == null)
                {
                    
                    document.getElementById("err_message").innerHTML="*Message Required";
                    valid = false;
                }
                
                if(email == "" || email == null)
                {
                    
                    document.getElementById("err_email").innerHTML="*Email Address Required";
                    valid = false;
                }
                else if( atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length )
                {
                    document.getElementById("err_email").innerHTML="*Please enter a valid e-mail address";
                    valid = false;
                }
                return valid;
            }

            function checkName()
            {
                if (document.getElementById("name").value == "")
                {
                    document.getElementById("err_name").innerHTML = "*Name Required";
                    document.getElementById("err_name").style.color = "red";
                    document.getElementById("name").style.borderColor = "red";
                }
                else if(!isNaN(document.getElementById("name").value))
                {
                    
                    document.getElementById("err_name").innerHTML="*You Cannot Input Numeric Value";
                    document.getElementById("err_name").style.color = "red";
                    document.getElementById("name").style.borderColor = "red";
                }
                else
                {
                    document.getElementById("err_name").innerHTML = "";
                    document.getElementById("name").style.borderColor = "black";
                } 
            }

            function checkEmail()
            {
                var email       = document.getElementById("email").value;
                var atposition  = email.indexOf("@");  
                var dotposition = email.lastIndexOf(".");

                if (document.getElementById("email").value == "")
                {
                    document.getElementById("err_email").innerHTML = "*Email Required";
                    document.getElementById("err_email").style.color = "red";
                    document.getElementById("email").style.borderColor = "red";
                }
                else if( atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length )
                {
                    document.getElementById("err_email").innerHTML="*Please enter a valid e-mail address";
                    document.getElementById("err_email").style.color = "red";
                    document.getElementById("email").style.borderColor = "red";
                }
                else
                {
                    document.getElementById("err_email").innerHTML = "";
                    document.getElementById("email").style.borderColor = "black";
                } 
            }

            function checkMessage()
            {
                if (document.getElementById("message").value == "")
                {
                    document.getElementById("err_message").innerHTML = "*Message Required";
                    document.getElementById("err_message").style.color = "red";
                    document.getElementById("message").style.borderColor = "red";
                }
                else
                {
                    document.getElementById("err_message").innerHTML = "";
                    document.getElementById("message").style.borderColor = "black";
                } 
            }

        </script>

        <?php include_once('javascript.php'); ?>

    </body>
</html>