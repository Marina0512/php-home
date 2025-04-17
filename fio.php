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


$capitalizedName = capitalizeName($name);
$capitalizedSurname = capitalizeName($surname);
$capitalizedPatronymic = capitalizeName($patronymic);

$nameInitial = mb_substr($capitalizedName, 0, 1);
$patronymicInitial = mb_substr($capitalizedPatronymic, 0, 1);

$surnameAndInitials = $capitalizedSurname . " " . $nameInitial . "." . $patronymicInitial . ".";
$fio = $nameInitial . $surname . $patronymicInitial;

echo "Фамилия и инициалы: " . $surnameAndInitials . PHP_EOL;
echo "ФИО: " . $fio . PHP_EOL;

?>