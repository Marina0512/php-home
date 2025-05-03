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

    $firstDayTimestamp = mktime(0, 0, 0, $month, 1, $year);
    $firstDayOfWeek = (int)date("N", $firstDayTimestamp);

    for ($i = 1; $i < $firstDayOfWeek; $i++) {
        echo "    ";
    }

    $currentDayOfWeek = $firstDayOfWeek;
    $day = 1;
    $workDayCounter = 0;

    while ($day <= $daysInMonth) {
        $timestamp = mktime(0, 0, 0, $month, $day, $year);
        $dayOfWeek = (int)date("N", $timestamp);

        if ($workDayCounter == 0) {
        
            if ($dayOfWeek == 6 || $dayOfWeek == 7) {
                $daysToMonday = ($dayOfWeek == 6) ? 2 : 1;
                $monday = $day + $daysToMonday;

                if ($monday <= $daysInMonth) {
                    printf("\033[32m%2d \033[0m ", $monday);
                    $day = $monday;

                } else {
                    printf("%2d  ", $day);
                    }
            }
            else {
              printf("\033[32m%2d \033[0m ", $day);
            }

            $workDayCounter = 1;


        } else {
            printf("%2d  ", $day);
             $workDayCounter++;
             if ($workDayCounter == 3)
                $workDayCounter = 0;

        }

        $currentDayOfWeek++;
        if ($currentDayOfWeek > 7) {
            $currentDayOfWeek = 1;
            echo "\n";
        }

        $day++;
    }
    echo "\n";
}

$startYear = 2025;
$startMonth = 1;
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