<?php

declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function getOperation(array $items, array $operations): string
{
    system('cls');

    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $items) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }

    $menuOptions = $operations;
    if (empty($items)) {
        unset($menuOptions[OPERATION_DELETE]);
    }

    echo 'Выберите операцию для выполнения: ' . PHP_EOL;
    echo implode(PHP_EOL, $menuOptions) . PHP_EOL . '> ';
    return trim(fgets(STDIN));
}

function addItem(array $items): array
{
    echo "Введите название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
    return $items;
}

function deleteItem(array $items): array
{
    if (empty($items)) {
        echo "Список покупок пуст. Нечего удалять.\n";
        echo "Нажмите Enter для продолжения...";
        fgets(STDIN);
        return $items;
    }

    echo 'Введите название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    $key = array_search($itemName, $items, true);
    if ($key !== false) {
        unset($items[$key]);
        $items = array_values($items);
    } else {
        echo "Товар '$itemName' не найден в списке.\n";
        echo "Нажмите Enter для продолжения...";
        fgets(STDIN);
    }

    return $items;
}

function printList(array $items): void
{
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo 'Всего ' . count($items) . ' позиций. ' . PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

do {
    $operationNumber = getOperation($items, $operations);

    if (!array_key_exists($operationNumber, $operations)) {
        echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        echo "\n ----- \n";
        continue;
    }

    echo 'Выбрана операция: ' . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            $items = addItem($items);
            break;

        case OPERATION_DELETE:
            $items = deleteItem($items);
            break;

        case OPERATION_PRINT:
            printList($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber != OPERATION_EXIT);

echo 'Программа завершена' . PHP_EOL;

?>
