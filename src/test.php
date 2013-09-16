<?php

require_once '../vendor/autoload.php';

use Validation\Validator;
use Validation\Validators;


$ble = new \stdClass();
$ble->foo = 'Hello';
$ble->bar = 'world!';

$validator = new Validator();

$validation = $validator
    ->add(Validators\Data::foo($ble))
    ->add(Validators\Data::bar($ble))
;

echo $validator->validate()->getMessage() . PHP_EOL;

$ble->bar = 'there';

echo $validator->validate()->getMessage() . PHP_EOL;

$ble->foo = 'here';

echo $validator->validate()->getMessage() . PHP_EOL;
