<?php

namespace Validation;

use Closure;

class Validation {

    /** @var string     */ protected $name;
    /** @var Closure    */ protected $worker;
    /** @var int        */ protected $code;
    /** @var string     */ protected $message;
    /** @var array      */ protected $params;

    /**
     * @param          $name
     * @param callable $worker
     * @param          $code
     * @param          $message
     * @param array    $params
     */
    public function __construct($name, Closure $worker, $code, $message, $params = array() ) {
        $this->name = $name;
        $this->worker = $worker;
        $this->code = $code;
        $this->message = $message;
        $this->params = $params;
    }

    /**
     * @return bool
     */
    public function execute() {
        $w = $this->getWorker();
        return $w($this->getParams());
    }

    /**
     * @return Validation
     */
    public static function passed() {
        return new Validation('ok', function() {return true;}, 0, "OK");
    }

    /**
     * @param int $code
     * @return Validation
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param string $message
     * @return Validation
     */
    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }


    /**
     * @param string $name
     * @return Validation
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param array $params
     * @return Validation
     */
    public function setParams($params) {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function &getParams() {
        return $this->params;
    }

    /**
     * @param callable $worker
     * @return Validation
     */
    public function setWorker(Closure $worker) {
        $this->worker = $worker;
        return $this;
    }

    /**
     * @return callable
     */
    public function getWorker() {
        return $this->worker;
    }
}