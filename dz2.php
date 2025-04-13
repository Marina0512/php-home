<?php   

$number1 = trim(fgets(STDIN));

if (!is_numeric($number1))
fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);

$number2 = trim(fgets(STDIN));

if (!is_numeric($number1))
fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);

else ($number2 === 0);
fwrite(STDERR, "Делить на 0 нельзя" . PHP_EOL);

$number = $number1 / $number2;

echo(STDOUT. $number . PHP_EOL);
?>