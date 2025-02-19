<?php

declare(strict_types=1);

namespace App;

/**
 * Class that does not adhere to PSR standards
 */
class SomeClass
{
    public function doSomething():string {
        return
            "string";
    }

    public function doSomethingElse():string{
        $array = [1, 2,3 ];
        foreach ($array as $key  => $value)
        {
            echo "test";
        }

        return "";
    }
}
