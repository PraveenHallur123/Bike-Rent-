<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>


          <li><a href="page.php?type=aboutus">About Us</a></li>
            <li><a href="page.php?type=faqs">FAQs</a></li>
            <li><a href="page.php?type=privacy">Privacy</a></li>
          <li><a href="page.php?type=terms">Terms of use</a></li>
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>Subscribe Newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users very week.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div class="default-header">
    <div class="container">
      <div class="row">
        
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="mailto:bikerental65@example.com">bikerental65@gmail.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:8618967846">+91-8618967846</a> </div>

   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{

echo "Welcome To Bike rental portal";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div> 


</footer>
