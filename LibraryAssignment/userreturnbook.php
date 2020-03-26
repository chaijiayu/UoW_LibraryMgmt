<?php
session_start();

include('configuration.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:userdashboard.php');
}
else{ 

if(isset($_POST['update']))
{
	
//echo "Today is " . date("Y-m-d") . "<br>";
	//echo date('Y-m-d', strtotime($Date. ' + 10 day'));

	


//set status to not available
$userid = $_SESSION['userID'];





$issuesdate = 0;
$returndate = 0;
$userid=0;
$title=$_POST['title'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$isbn=$_POST['isbn'];
$cost=$_POST['cost'];
$status="Available";
$BookNo=intval($_GET['bookid']);
$sql="update booklist set Title=:title,ISBN=:isbn,Author=:author,Publisher=:publisher,Status=:status,Cost=:cost,Userid=:userid, issuesDate=:issuesdate, ReturnDate=:returndate where BookNo=:BookNo";
$query = $dbh->prepare($sql);
$query->bindParam(':issuesdate', $issuesdate, PDO::PARAM_STR);
$query->bindParam(':returndate', $returndate, PDO::PARAM_STR);
$query->bindParam(':userid', $userid, PDO::PARAM_STR); 
$query->bindParam(':cost', $cost, PDO::PARAM_STR); 
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':BookNo',$BookNo,PDO::PARAM_STR);

$query->execute();


$_SESSION['msg']="Book returned successfully";
header('location:userrecords.php');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Return a book</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('userheader.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Return a book</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">
<?php 
$BookNo=intval($_GET['bookid']);

$sql = "SELECT * from booklist where BookNo =:BookNo";
$query = $dbh -> prepare($sql);
$today = date("Y-m-d");
$fineMsg = array();

//$givenreturndate = $_POST['returndate'];
//$today = time();
//$difference = $today - $givenreturndate;
//$query->bindParam(':returndate',$givenreturndate,PDO::PARAM_STR);
$query->bindParam(':BookNo',$BookNo,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{

foreach($results as $result)

{
	$returnDateValue = $result->ReturnDate;
	if (strtotime($today) > strtotime($returnDateValue)) {
	$dueFine = ((strtotime($today)) - strtotime($returnDateValue))/86400;
	$due2 = $result->Cost * $dueFine;
	$fineMsg[]= $due2;
}else{
	$fineMsg[]="0";
}
	
	?>  

<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->Title);?>" required readonly />
</div>
<div class="form-group">
<label>ISBN<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBN);?>" required readonly />
</div>
<div class="form-group">
<label>Book Author<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->Author);?>" required readonly />
</div>



<div class="form-group">
<label>Publisher<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="publisher" value="<?php echo htmlentities($result->Publisher);?>"  required="required" readonly />

</div>

<div class="form-group">
<label>Cost<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="cost" value="<?php echo htmlentities($result->Cost);?>"  required="required" readonly />

</div>

<div class="form-group">
<label>Borrow Date<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="issuesdate" value="<?php echo htmlentities($result->issuesDate);?>"  required="required" readonly />

</div>

<div class="form-group">
<label>Given Return Date<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="returndate" value="<?php echo htmlentities($result->ReturnDate);?>"  required="required" readonly />

</div>

<div class="form-group">
<label>Amount of overdue to pay ($)<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="overdue" value="<?php echo htmlentities($fineMsg[0]);?>"  required="required" readonly />

		
</div>


 <?php }} ?>
<button type="submit" name="update" class="btn btn-info">Returned </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
