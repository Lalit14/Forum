
  <?php
  include '_dbconnect.php';
  ?>
<?php
session_start();
 
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/forum">iCoders</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
 $sql="SELECT cat_id,cat_name FROM `categories` LIMIT 3";
  $result=mysqli_query($conn,$sql);
  while(  $row=mysqli_fetch_assoc($result)){
 $id=$row['cat_id']; 
       
 echo '  <a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$row['cat_name'].'</a>';
  }
        
          echo '</div>
          
        </ul>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){

echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">

  <li class="btn btn-outline my-2 my-sm-0">
    <a class="nav-link " href="logout.php">Logout</a>
  </li>

  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
 
  <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Search</button>
<p class="text-light my=4 mx-2">welcome '.$_SESSION['username'].'
</p></form>';
    }else{

      echo '
      <form class="form-inline my-2 my-lg-0">
      <li class="btn btn-outline my-2 my-sm-0">
          <a class="nav-link" href="signup.php">SignUp</a>
        </li>
        <li class="btn btn-outline my-2 my-sm-0">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        
      
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>';
    }
?>
    </div>
</nav>