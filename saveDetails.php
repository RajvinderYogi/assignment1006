<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Data</title>
   <!--styles here link and custom-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style>
        body {
            color: chocolate;
            font-size: 18px;
            font-family: "Bookman Old Style";
        }
        h1 {
            color: Chocolate;
            text-decoration: underline;
        }
        a{
            color: chocolate;
            text-decoration: underline;
        }

    </style>
</head>
<body>
<?php
//  define variables and get data from enterDetails.php page
$fName =$_POST['fName'];
$lName=$_POST['lName'];
$email=$_POST['email'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$countries=$_POST['countries'];
 //ok variable to show if there is any error
$ok=true;
//input validations
if(empty($fName)) {
    echo 'First name required <br />';
    $ok = false;
}
if(empty($lName)){
    echo 'Last name  required <br />';
    $ok=false;
}
if(empty($email)){
    echo 'Email is required <br />';
    $ok=false;
}
if(!empty($age)) {
    if ($age < 14) {
        echo 'You must be 14 years old';
        $ok = false;
    }
    else{

        $age =intval($age);
    }
}


// if code is error free run the command
if ($ok==true) {
    $conn = new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006assignment1', 'bb90935d50453f', '03ff61b8');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO createProfile(fName,lName,email, age, gender,countries)VALUES( :fName, :lName,:email,:age,:gender,:countries);";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':fName', $fName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lName', $lName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 254);
    $cmd->bindParam(':age', $age, PDO::PARAM_INT);
    $cmd->bindParam(':gender', $gender, PDO::PARAM_STR, 6);
    $cmd->bindParam(':countries', $countries, PDO::PARAM_STR, 50);
    $cmd->execute();
    $conn = null;
    echo 'Candidate Information Saved<br>';
}
?>
<!-- link to showDeatils.php page-->
<a href="showDetails.php">Show All User's Profile</a>



</body>
</html>



