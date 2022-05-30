<?php
include 'connect.php';
error_reporting(0);

if(isset($_POST['submit'])){
    $name= $_POST['username'];
    $email= $_POST['email'];
    $comment= $_POST['comment'];

    $sql= "insert into commentstbl(username,email,comment)
    values('$name','$email','$comment')";
    
    $result= mysqli_query($conn,$sql);
    
    if ($result){
        echo "<script> alert('comment added')</script>";    
    } else{
        die(mysqli_error($conn));    
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.css">

<!--JQuery-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script

    <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <!-- Custom CSS-->

<link rel="stylesheet" href="style.css">

<!--Typed Js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
     $(document).ready(function(){
  $("#services").click(function(){
    $('#row').fadeIn(1000).removeClass('hidden')
    $('#about').fadeIn(1000)
/*! Fades in page on load */
$('body').css('display', 'none');
$('body').fadeIn('slow');

});

});


</script>





</head>
<body>
  <!--============== Navbar==========-->
  <nav  id="navbar"  class="navbar navbar-expand-md navbar-success fixed-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://a-nesu.github.io/Informaticstechzim/"><span id="info">Informatics</span><span id="tech">Tech_zim</span> </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#myCarousel">Home</a>
          </li>
          <li class="nav-item">
            <a  id="abouts" class="nav-link" href="#about">About</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#dropdown" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Languages</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="#dropdown"></a></li>
              <li><a class="dropdown-item" href="#">HML</a></li>
              <li><a class="dropdown-item" href="#">CSS</a></li>
              <li><a class="dropdown-item" href="#">PHP</a></li>
             </ul>

          <li class="nav-item">
            <a class="nav-link enabled" href="#services-section" id="services">Services</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#dropdown" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Updates</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="#">Recent updates</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            <li class="nav-item">
              <a class="nav-link enabled" href="contact.php" id="services">Contact</a>
            </li>


        </ul>

        
        <form class="d-flex">
          <button class="btn btn-outline" type="submit" id="sign-up" >Get Started</button>
        </form>
      </div>
    </div>
  </nav><br><br><br><br><br>


  

  <main>

<div class="container" id="container-form" style="border: 2px solid black;height: fit-content;border-radius:5px;">
<h1>Comment Our Services</h1> 
<form action="" method="post">
<input type="text" name="username" id="name" placeholder="Enter your username" <?php echo $name?> required><br><br>
<input type="email" name="email" id="email" placeholder="Enter your Email Address" <?php echo $email?> required><br><br>
<input type="text" name="comment" id="comment" placeholder="Enter your Comment" <?php echo $comment?> required><br><br>
<input type="time" name="" id="">
<Button class="btn btn-primary" id="submit" name="submit">Submit</Button>
</form> <br><br><br><br>


<div class="container" style="height: fit-content;">

<?php
$sql= "select * from commentstbl";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){

?>
<div class="single-item">
<i class="fa fa-user" style="font-size:32px;color:orange;">user</i>


<h4><?php echo $row['username'];?></h4>
<h4><?php echo $row['Id'];?></h4>

<a href="#" style="text-decoration:none;color:orangered;font-style:italic"><?php echo $row['email'];?></a>
<p><?php echo $row['comment'];?></p>
</div>
<?php
echo( date('d F Y', strtotime($comment['date']) ) );
  }
}


?>

</div>








</main>


</body>
</html>