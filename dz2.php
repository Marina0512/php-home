<?php   

$number1 = trim(fgets(STDIN));

if (!is_numeric($number1)) {
fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
exit(1);
}
$number2 = trim(fgets(STDIN));

if (!is_numeric($number2)) {
fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
exit(1);
}
if ($number2 == 0) {
fwrite(STDERR, "Делить на 0 нельзя" . PHP_EOL);
exit(1);
}

$number = $number1 / $number2;

echo ($number . PHP_EOL);
exit(0);
?>