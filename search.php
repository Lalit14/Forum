<!doctype html>
<!-- https://source.unsplash.com/1600x900/?coding,programming -->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>search </title>
    
  </head>
  <body>

  <?php
  include '_nav.php';
  include '_dbconnect.php';
  ?>
  <div class="container">
<div>
<h1>search results for "<?php echo $_GET['search']?>"</h1>
<div class="result">
<h3>
<?php
$q=$_GET["search"];
$sql="SELECT * FROM threads WHERE MATCH (th_title,th_des) against ('$q')";
$result=mysqli_query($conn,$sql);
$noresult=true;
while( $row=mysqli_fetch_assoc($result)){
  $ques_title=$row['th_title']; 
  $description=$row['th_des']; 
  $th_id=$row['th_id']; 
  $url="thread.php?threadid=".$th_id;
//  echo $row['cat_des']; 
//  $des= $row['cat_des']; 
$noresult=false;
 
echo '
 <div class="container"> 
 <h3> <a href="'.$url.'" class="text-dark">'.$ques_title.'</a></h3>
 
 <h6 class=" text-grey">'.$description.'</h6>

 </div>';
  }
  if($noresult){
echo '<div class="jumbotron jumbotron-fluid">
<div class="container">
  <h3 class="display-4">No Result Found</h3>
</div>
</div>';

  }
 ?>
</h3>
</div>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>