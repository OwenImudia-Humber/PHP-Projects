<?php
declare(strict_types=1);

require_once 'grade_tools_lab5.php';

var_dump(grade_is_valid(85));
var_dump(grade_is_valid(100)); 


echo grade_letter(85);
echo grade_letter(50); 

grade_display_result("Test message");
grade_display_result("Grade A", "h2");
?>