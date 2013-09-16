<?php

namespace Validation;

class Validator {

    /**
     * @var Validation[]
     */
    protected $validations = array();

    /**
     * @param Validation $validation
     * @return Validator
     */
    public function add(Validation $validation) {
        $this->validations[$validation->getName()] = $validation;
        return $this;
    }

    /**
     * @param bool       $expr
     * @param Validation $validation
     *
     * @return Validator
     */
    public function addIf($expr, Validation $validation) {
        if ($expr) {
            return $this->add($validation);
        }
        return $this;
    }

    /**
     * @param string $key
     */
    public function remove($key) {
        unset($this->validations[$key]);
    }

    /**
     * @return Validation
     */
    public function validate() {
        /** @var Validation $validation */
        foreach($this->validations as $name => $validation) {

            if (!$validation->execute()) {
                return $validation;
            }
        }

        return Validation::passed();
    }
}