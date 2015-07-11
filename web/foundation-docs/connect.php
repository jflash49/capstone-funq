
<?php
    include('quizquestion_script.php');
    //Connect to the database
    $host = "jflash49-capstone-1584327";   //See Step 3 about how to get host name
    $user = "jflash49";                     //Your Cloud 9 username
    $pass = "";                                 //Remember, there is NO password!
    $db = "IQTEST";                          //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306

    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    


    //And now to perform a simple query to make sure it's working
    $i = 0 ;
    
   /* $query = "SELECT * FROM schools";
    $result = mysqli_query($connection, $query);
   while ($row = mysqli_fetch_assoc($result)) 
  {
    echo $row['KINGSTON_STANDREW'].',';
  }*/
    $query = "SELECT * FROM Userview where Parish = 'Kingston and Saint Andrew'";
    $result = mysqli_query($connection, $query);?>
    <h2>Students filtered by Parish, Kingston and St. Andrew</h2>
    <hr>
    <table cellpadding='10px'>
  <thead>
    <tr>
      <th>First Name</th><th>Last Name</th><th>School</th><th>Class</th><th>Parish</th><th>IQ</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  while ($row = mysqli_fetch_assoc($result)) 
  {
    if ($i>5){
         break;}
    else {  echo "<tr><td>" .$row['firstName'] ."</td><td>" .$row['lastName'] ."</td><td>" .$row['School'] ."</td><td>" .$row['Class'] ."</td><td>&nbsp;&nbsp;  " .$row['Parish'] ."</td><td>" .$row['IQ'] ."</td></tr>" ;

    }
    $i++;
  }
  ?>
  </table>
  <hr>
  <h2>General student question and answer</h2>
  <?php
  $query = "SELECT * FROM UserQuiz where quizNum <10";
    $result = mysqli_query($connection, $query);
    ?>
    <table cellpadding='10px'>
  <thead>
    <tr>
      <th>First Name</th><th>Last Name</th><th>Correct Questions</th><th>Incorrect Questions</th><th>Percentage</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=0;
  while ($row = mysqli_fetch_assoc($result)) 
  {
    if ($i>5){
         break;}
    else {  echo "<tr><td>" .$row['firstName'] ."</td><td>" .$row['lastName']."</td><td>" .$row['correct_questions'] ."</td><td>" .$row['incorrect_questions'] ."</td><td>".( ($row['correct_questions']/200)*100)."&#37;</td>";

    }
    $i++;
  }
  ?>
  </table>
  <hr>
  <h2>IQ result for students in class A0</h2>
  
  <?php
  $query = "SELECT * FROM Userview where Class = 'A0'";
    $result = mysqli_query($connection, $query);?>
    <table cellpadding='10px'>
  <thead>
    <tr>
      <th>First Name</th><th>Last Name</th><th>Class</th><th>IQ</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  while ($row = mysqli_fetch_assoc($result)) 
  {

   echo "<tr><td>" .$row['firstName'] ."</td><td>" .$row['lastName'] ."</td><td>" .$row['Class'] ."</td><td>" .$row['IQ'] ."</td></tr>" ;

  }
  ?>
  </table>
  <hr><?php
  
  $query = "SELECT * FROM QuizQuestion";
  $result = mysqli_query ($connection, $query);
  if (mysqli_num_rows($result)==0){
    
    populate($connection);
  }else
  echo "Database already populated";
  
  
  ?>
  <hr>
  <h2>Number of Participating Schools</h2>
  
<?php
  
$query = "SELECT * FROM SchoolCount ;";
$result = mysqli_query($connection, $query);
$quer = "SELECT Count(*) AS 'Cnt' FROM SchoolCount ;";
$rest = mysqli_query($connection, $quer);

?>
<table cellpadding='5px' >
<thead>
  <tr>
    <th>No. of Students</th><th>School</th><th> Participation Percentage</th>
  </tr>
</thead>
<tbody>
<?php
  while ($re = mysqli_fetch_assoc($rest)) 
  {
      $total = $re['Cnt'];
  }
  while ($row = mysqli_fetch_assoc($result)) 
  {

   echo "<tr><td align = 'center'>".$row['No_Students']."</td><td>&nbsp;&nbsp;&nbsp;".$row['School'] ."</td><td>".round((($row['No_Students']/ $total)*100),2)."&#37;</tr>" ;
  }
  ?>
</table>
<hr>

  
  
  

  

