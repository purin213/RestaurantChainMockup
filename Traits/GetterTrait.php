<?php
namespace Traits\GetterTrait;

use BadFunctionCallException;

trait GetterTrait {
    public function getClassVariable(callable $variableName): mixed{
        try{
            if (!isset($this->$variableName)) {
                throw new BadFunctionCallException("Class variable {$variableName} does not exist.");
            }
            return $this->$variableName;
        }
        catch(BadFunctionCallException $e){
            echo "Bad function call exception called: {$e}", PHP_EOL;
        }
    }
}
