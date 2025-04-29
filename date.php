<?php

declare(strict_types=1);

function workSchedule(int $year, int $month): void
{
    if ($month < 1 || $month > 12) {
        echo "Некорректный номер месяца. Введите от 1 до 12. \n";
        return;
    }

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $monthName = date("F", mktime(0, 0, 0, $month, 1, $year));

    echo "$monthName $year:\n"; 
    
    $isWorkingDay = true;
    $dayOffCounter = 0;

    for ($day = 1; $day <= $daysInMonth; $day++) {
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        $dayOfWeek = date("N", $timestamp);

        if ($isWorkingDay) {
            if ($dayOfWeek >= 6) {
                $daysUntilMonday = 8 - $dayOfWeek;
                $newTimestamp = mktime(0, 0, 0, $month, $day + $daysUntilMonday, $year);

                if (date('m', $newTimestamp) != $month) {
                    printf("%2d(+) ", $day); 
                } else {
                    printf("\033[32m%2d(+)\033[0m ", $day + $daysUntilMonday);
                }
            } else {
                printf("\033[32m%2d(+)\033[0m ", $day);
            }
            $isWorkingDay = false;
            $dayOffCounter = 0;
        } else {
            printf("%2d   ", $day);
            $dayOffCounter++;
            if ($dayOffCounter == 2) {
                $isWorkingDay = true;
            }
        }
        if ($day % 7 === 0) {
            echo "\n"; 
        }
    }
    echo "\n";
}

$startYear = (int)date('Y');
$startMonth = (int)date('m');
$numMonths = 1;

for ($i = 0; $i < $numMonths; $i++) {
    $year = $startYear;
    $month = $startMonth + $i;

  
    if ($month > 12) {
        $year += floor($month / 12);
        $month = $month % 12;
        if ($month === 0) {
            $month = 12;
            $year--;
        }
    }

    workSchedule($year, $month);
}

?>