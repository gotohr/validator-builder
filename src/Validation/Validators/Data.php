<?php

namespace Validation\Validators;

use Validation\Validation;

class Data {

    const SC_FOO = 1;
    const SC_BAR = 2;

    /**
     * @param $container
     * @return Validation
     */
    public static function foo($container) {
        return new Validation(
            'Data.foo',
            function () use($container) {
                return $container->foo == "Hello";
            },
            self::SC_FOO,
            'foo ne valja.'
        );
    }

    /**
     * @param $container
     * @return Validation
     */
    public static function bar($container) {
        return new Validation(
            'Data.bar',
            function () use($container) {
                return $container->bar == "world!";
            },
            self::SC_BAR,
            'bar ne valja.'
        );
    }

}