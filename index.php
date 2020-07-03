<!doctype html>
<!-- https://source.unsplash.com/1600x900/?coding,programming -->
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>forum</title>
    <style>
    body {
        background-image: url('back.jpg');
        background-size: 100% 100%;
    }

    .card-body {
        background-color: LightGray;
    }
    </style>
</head>

<body>

    <?php
  include '_nav.php';
  include '_dbconnect.php';
  ?>
    <div class="container">


        <div class="row">
            <?php
  $sql="SELECT * FROM `categories`";
  $result=mysqli_query($conn,$sql);
  $k=1;
  while(  $row=mysqli_fetch_assoc($result)){
 $id=$row['cat_id']; 
 $name=$row['cat_name']; 
//  echo $row['cat_des']; 
$des= $row['cat_des']; 
 
echo '
<div class="col-md-4 my-4"> 
<div class="card " style="width: 18rem;">
<img class="card-img-top" src="404.jpg" alt="Card image cap">
<div class="card-body dark">
  <h5 class=" text-dark text-center "><b ><a class=" text-dark" href="threadlist.php?catid='.$id.'"  >'.$name.'</a></b></h5>
  <p class="card-text">'.substr( $des ,0,80).'</p>
  <a href="threadlist.php?catid='.$id.'"  class="btn btn-dark">View  </a>

</div>
</div>

</div>';
$k=$k+1;
}

?>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>