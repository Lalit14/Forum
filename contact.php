<?php  
  $k=false;
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  

  <style>


    .notification-bell {
      position: absolute;
      right: 0px;
    }

    .dropdown-menu-notify {
      overflow-y: scroll;
      overflow-x: hidden;
      max-height: 400px;
      top: 60px;
      right: -1px;
      left: unset;
      width: 460px;
      box-shadow: 0px 5px 7px -1px #c1c1c1;
      padding-bottom: 0px;
      padding: 0px;
    }

    ul ul a {
      background: transparent;

    }

    .dropdown-menu-notify:before {
      content: "";
      position: absolute;
      top: -20px;
      right: 12px;
      border: 10px solid white;
      border-color: transparent transparent white transparent;
    }



    .head-notify {
      padding: 5px 15px;
      border-radius: 3px 3px 0px 0px;
    }

    .footer-notify {
      padding: 5px 15px;
      border-radius: 0px 0px 3px 3px;
    }

    .notification-box-notify {
      padding: 10px 0px;
    }

    .bg-gray-notify {
      background-color: #eee;
    }

    @media (max-width: 640px) {
      .dropdown-menu-notify {
        top: 50px;
        left: -16px;
        width: 290px;
      }

      .nav-notify {
        display: block;
      }

      .nav-notify .nav-item-notify,
      .nav-notify .nav-item-notify a {
        padding-left: 0px;
      }

      .message-notify {
        font-size: 13px;
      }
    }
  </style>

  
  <link rel="stylesheet" href="/static/common/css/base.css">
  <link rel="icon" type="image/png" href="/static/common/img/favicon.png">

  <title>Contact Me
 - lalit Chouhan</title>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  
</head>

<body>
  <?php include '_nav.php'?>
  
  <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

    
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $description=$_POST['message'];
  $sql="INSERT INTO `contact` (`contact_name`, `contact_email`, `contact_phone`, `contact_description`, `contact_date`) VALUES ('$name', '$email', '$phone', '$description', current_timestamp());";
$result=mysqli_query($conn,$sql);
if($result){
$k=true;

} 
}  
  ?>
<?php
  if($k){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> query has been sent we will get back to you soon 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-lg-6 offset-lg-2">

            <!-- THE CONTACT FORM IS HERE -->
                <h2>Contact me!</h2>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method='post'><input type="hidden" name="csrfmiddlewaretoken" value="UWT0SWdUU4IXO0RfCOMW6ogcyYQRzkaVlMLzbENTXe5H4WcXJIg6eW1yOJxIDn7M">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="name" class="form-control" id="name" placeholder="Enter your Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="cemail" placeholder="Enter your Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Your Phone Number (with country code)</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your Phone Number"
                            name="phone">
                    </div>
                    <div class="form-group">
                        <label for="description">Describe what you want to contact me for here</label>
                        <textarea type="text" class="form-control" id="message" placeholder="Your message" name="message"></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LdvcqwUAAAAACmPYNVoiJA7D84xLSQQt5g9p10m"></div>
                    <button type="submit" class="btn btn-danger mt-2">Submit</button>
                </form>
            
        </div>
        <hr>

        <!-- SIDE WIDGET IS HERE -->
        <div class="col-md-4">
    <div class="col-md-8">
        <div class="my-4">
            <h4>Ask your query or issue related to Bugs, errors you are facing  </h4>
          
            <div class="my-2">
                <div class="g-ytsubscribe" data-channelid="UCeVMnSShP_Iviwkknt83cww" data-layout="full"
                    data-count="default"></div><br>
            </div>
                 </div>
    </div>

</div>
    </div>
</div>




  
  
</body>

</html>