<?php
/**
 * Created by PhpStorm.
 * User: arne
 * Date: 02.03.19
 * Time: 14:54
 */

require_once __DIR__ . '/Tower.php';
require_once __DIR__ . '/Dish.php';

$steps = 0;

function moveIter($disksToWork, Tower &$tower_a, Tower  &$tower_b,Tower  &$tower_c,&$steps) {
    if ($disksToWork === 1) {
        move($tower_a, $tower_b, $steps);
    } else {
        moveIter($disksToWork-1, $tower_a,$tower_c,$tower_b,$steps);
        move($tower_a, $tower_b, $steps);
        moveIter($disksToWork-1,$tower_c,$tower_b,$tower_a,$steps);
    }
}

function move(Tower $tower_a,Tower $tower_b, &$steps) {
    $steps++;
    $dish = $tower_a->removeFromStack();
    $tower_b->addToStack($dish);
}

if(!array_key_exists(1,$argv)) {
    print_r ("Bitte Anzahl Scheiben angeben" . PHP_EOL);
    die();
}
$disks = $argv[1];
if ($disks < 2) {
    print_r('i saw what you did there...'.PHP_EOL);
    die();
}
$tower1 = new Tower ('SOURCE', $disks);
$tower2 = new Tower ('DESTIONATION', 0);
$tower3 = new Tower ('TEMP', 0);


moveIter($disks,$tower1,$tower2,$tower3,$steps);
print_r($steps . ' Züge benötigt' . PHP_EOL);