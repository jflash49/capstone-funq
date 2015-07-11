<?php
function populate($con) 
  {
    $query = "SELECT quizNum,correct_questions,incorrect_questions FROM QuizResults";
    $result = mysqli_query ($con, $query);
    
   while ($row = mysqli_fetch_assoc($result))
    {
      
      $correct = $row['correct_questions'];
      
      $query = "select question_ID, answer from Question ORDER By RAND() LIMIT 200;";
      $rest = mysqli_query($con, $query);
      
      while($row2 = mysqli_fetch_assoc($rest))
      {
        $arr = array('a','b','c','d','e','f');
        $quiz=$row['quizNum'];
        $quest = $row2['question_ID'];
        $ans = $row2['answer'];
        if ($correct >0)
          {
            $query = "Insert into QuizQuestion (quizNum, question_ID, answer )values('$quiz','$quest','$ans')";
            if( mysqli_query($con,$query)) 
              {
                echo "New Record Added correct";
             }
            else
              {
                echo "Error :" .mysqli_error($con);
              }
            $correct --;
          }
        else
        {
          $arg = array_search($ans,$arr);
          unset($arr[$arg]);
          $ran = array_rand($arr,1);
          $query = "Insert into QuizQuestion (quizNum, question_ID, answer )values('$quiz','$quest','$arr[$ran]')";
          if( mysqli_query($con,$query)) 
              {
                echo "New Record Added" . $arr[$ran];
              }
            else
              {
               echo "Error :" .mysqli_error($con);
            }
            $correct --;
        }
      }
    }
    echo "done";
  }
  
  ?>