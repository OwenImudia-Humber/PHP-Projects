<?php 
function grade_is_valid(float $score): bool{
return $score >= 0 && $score <= 100;
}

function grade_letter(float $score): string{
  if ($score >=80){
        return "A";
    }elseif($score >=70 ){
        return "B";
    }elseif($score >=60){
        return "C";
    }elseif($score >=50){
        return "D";
    }else{
        return "F";
    }
}
function grade_display_result(string $message, string $tag = 'p'): void {
    echo "<$tag>$message</$tag>";
}
?>