<?php

function capitalizeName(string $string): string
{
    return mb_convert_case(trim($string), MB_CASE_TITLE, "UTF-8");
}

fwrite(STDOUT, "Введите имя: ");
$name = trim(fgets(STDIN));


fwrite(STDOUT, "Введите фамилию: ");
$surname = trim(fgets(STDIN));


fwrite(STDOUT, "Введите отчество: ");
$patronymic = trim(fgets(STDIN));


$fullname = capitalizeName($surname) . " " . capitalizeName($name) . " " . capitalizeName($patronymic);

echo $fullname . PHP_EOL;

?>