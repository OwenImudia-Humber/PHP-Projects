<?php
//Q1 Creating an associative array
    $Student_Info = array(
                    "Owen"=> 80,
                    "Joe"=> 90,
                    "Jane"=> 100,
                    "Noah"=> 75,
    );
    //Q2 Using foreach function for printing all the content
    foreach($Student_Info as $name=> $score){
        echo "{$name} = {$score} <br>";
    }

    //Q3 Using array_sum and count to find out the average of the scores
    $sum = array_sum($Student_Info);
    $total = count($Student_Info);
    $avg = $sum / $total;

    echo "The sum of the scores {$sum} <br>";
    echo "The total of the scores {$total} <br>";
    echo "The average of all the scores is {$avg} <br>";

    //Q4 Using in_array function
    $bool = in_array(90, $Student_Info);
    var_dump($bool);  

    //Q5 Using asort function to sort by highest to lowest
    $ranked_scores = $Student_Info;
    asort($ranked_scores);
     foreach($ranked_scores as $name=> $score){
        echo "<br> {$name} = {$score} <br>";
    }

    //Q6 Using the print_r function 
    echo "<pre>";
    echo "Original:\n";
    print_r($Student_Info);

    echo "Sorted:\n";
    print_r($ranked_scores);
    echo "</pre>";
?>