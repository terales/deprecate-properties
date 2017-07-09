<?php

class DeprecateProperties
{
    private $dataObject;
    private $deprecatedProps = array('db', 'user', 'payment');

    public function __construct()
    {
        // Use what we had in the codebase
        $this->dataObject = new stdClass();
    }

    public function __set($name, $value)
    {
        $this->logIfDeprecatedProperty($name, 'write');
        $this->dataObject->{$name} = $value;
    }

    public function __get($name)
    {
        $this->logIfDeprecatedProperty($name, 'read');
        return $this->dataObject->{$name};
    }

    private function logIfDeprecatedProperty($property, $type)
    {
        if (in_array($property, $this->deprecatedProps)) {
            echo "${type} deprecated property '${property}'\n";
        }
    }
}