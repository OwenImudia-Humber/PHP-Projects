<?php
$nf1 = number_format(12345); // 12,345
$nf2 = number_format(12345, 2); // 12,345.00
$nf3 = number_format(12345.674, 2); // 12,345.67
$nf4 = number_format(12345.675, 2); // 12,345.68
echo "Number format 1: $nf1<br>";
echo "Number format 2: $nf2<br>";
echo "Number format 3: $nf3<br>";
echo "Number format 4: $nf4<br>";
?>