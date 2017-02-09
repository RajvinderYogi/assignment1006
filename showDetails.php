<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Profile Details</title>

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
// connect database
$conn =new PDO('mysql:host=ca-cdbr-azure-central-a.cloudapp.net;dbname=comp1006assignment1','bb90935d50453f','03ff61b8');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//write sql query
$sql ="SELECT * FROM createProfile ORDER BY fName";
//execute  the query and store the results
$cmd =$conn->prepare($sql);
$cmd->execute();
$candidates =$cmd->fetchAll();
//table and heading for columns
echo '<table class ="table table-striped table-hover"><tr><th>First Name</th><th>Last Name</th><th>E-mail</th><th>age</th>
<th>Gender</th><th>Country</th></tr>';
//loop through the data
foreach($candidates AS $candidate){
    echo'<tr><td>'.$candidate ['fName'].'</td>
    <td>'.$candidate ['lName'].'</td>
    <td>'.$candidate ['email'].'</td>
    <td>'.$candidate ['age'].'</td> 
    <td>'.$candidate ['gender'].'</td>
    <td>'.$candidate ['countries'].'</td></tr>';

}


//end table
echo '</table><br>';

//disconnect database
$conn =null;




?>
<a href="enterDetails.php">Back</a>
<!-- Latest   jQuery -->
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>