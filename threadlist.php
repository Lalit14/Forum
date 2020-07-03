<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <style>    body {
  /* background-image: url('back2.jpg'); */
  background-color:LightGrey;
   background-size: 100% 100%;
}
</style>

    <title>forum</title>
  </head>
  <body>
  <?php
  include '_nav.php';
  
  include '_dbconnect.php';
  ?>
  <!-- main template start here  -->
<?php
  $id=$_GET['catid'];
  $sql="SELECT * FROM `categories` WHERE cat_id = $id";
$result=mysqli_query($conn,$sql);
  while(  $row=mysqli_fetch_assoc($result)){
  $id=$row['cat_id']; 
  $name=$row['cat_name']; 
//  echo $row['cat_des']; 
 $des= $row['cat_des']; 
 
  
  }
  
  
  ?>
  <div class="container"><div class="jumbotron">
  <h1 class="display-4">DISCUSSION PAGE</h1>
  <p class="lead"><?php echo $name;?></p>
  <hr class="my-4">
  <p><?php echo $des;?></p>

  <p class="lead">
  <div class="text-right"> <a class="btn btn-primary btn-lg btn-dark t" href="#" role="button">Learn more</a>
  </div> 
  </p>
</div>
</div>
<!-- main template ends here -->

  <!-- query ans ques code start here  -->
<?php

$showalert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
  
$ques_title=$_POST['title'];
$ques_description=$_POST['description'];
$ques_title=str_replace("<","$lt;",$ques_title);
$ques_title=str_replace(">","$gt;",$ques_title);
$ques_description=str_replace("<","$lt;",$ques_description);
$ques_description=str_replace(">","$gt;",$ques_description);

$sno=$_POST['sno'];
$sql="INSERT INTO `threads` ( `th_title`, `th_des`, `th_cat_id`, `th_user_id`, `timestamp`) VALUES ( '$ques_title', '$ques_description', '$id', '$sno',  current_timestamp())";
$result=mysqli_query($conn,$sql);
$showalert=true;

if($showalert){
  echo '<div class="container"> <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> result has been added</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div></div> ';}
}
?>
<div class="container">
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo '<div class="container">
<h2>Start Discussion :</h2>
<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
  <div class="form-group">
    <label for="exampleFormControlTextarea9">Add title </label>
    <textarea class="form-control" name="title" id="exampleFormControlTextarea1" rows="1"></textarea>
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea8">Add query</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea2" rows="3"></textarea>
  </div>
  <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">

  <button type="submit" class="btn btn-secondary">Post</button>
  
  </form>  
  </div>';
}
else{
echo '<div class="lead">
<a href="login.php" class="alert alert-warning">Login to our website to start discussion..... </a>
</div>';

}

?>
</div>



<!-- query ques and ans code ends here -->

<!-- browse questions -->
<div class="container">
<h2 class="my-2">Browse Questions</h2>
<?php
  $id=$_GET['catid'];
  $sql="SELECT * FROM `threads` WHERE th_cat_id=$id";
$result=mysqli_query($conn,$sql);
$noResult=true;
  while(  $row=mysqli_fetch_assoc($result)){
  $th_title=$row['th_title']; 
  $th_des=$row['th_des']; 
  $th_id=$row['th_id']; 
  $th_time=$row['timestamp']; 
  $th_user_id=$row['th_user_id']; 
  $sql2="SELECT * FROM `userdatabase` WHERE `sno` = '$th_user_id'";
  $result2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_assoc($result2);
//  echo $row['cat_des']; 
 $noResult=false;
echo '
<div class="media">
<img src="..." class="mr-3" alt="">
<div class="media-body">
<h5 class="mt-0">Q) <a class ="text-dark" href="thread.php?threadid='.$th_id.'">' .$th_title.' ?</a></h5><div class="mx-4">'.$th_des.'</div> </div>'.'
<p><b>By :'.$row2['username'].' </b>at '.$th_time.'</p>

</div>'; 
  
  }
  
  
  ?>

</div>
<div class="container">
<?php

if($noResult){
echo 
'<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="display-4">No Result Found </h1>
    <p class="lead"> Be the first person to Ask !</p>
  </div>
</div>';
}
  ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>