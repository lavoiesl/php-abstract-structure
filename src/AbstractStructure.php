<?php

namespace Lavoiesl\AbstractStructure;

use Lavoiesl\AbstractStructure\Exception\InvalidTypeException;
use Lavoiesl\AbstractStructure\Exception\UndefinedPropertyException;

abstract class AbstractStructure
{
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $type = $this->getPropertyType($property);

            if (self::validateCompoundType($type, $value)) {
                $this->$property = $value;
            } else {
                throw new InvalidTypeException(get_class($this), $property, $type);
            }

        } else {
            throw new UndefinedPropertyException(get_class($this), $property);
        }
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new UndefinedPropertyException(get_class($this), $property);
        }
    }

    /**
     * Returns acceptable type for a property
     * May be a compound type
     *
     * This method is the only one public to allow for reflection
     * You may override this method to provide initial restrictions
     *
     * @param  string $property
     * @return string
     */
    public function getPropertyType($property)
    {
        $value = $this->$property;

        if ($value === null) {
            // If value is not set, allow any value
            return 'mixed';
        } else {
            return self::getTypeOf($this->$property);
        }
    }

    /**
     * Processes all types separated by |
     * Ex: array|null
     * n.b. something|mixed makes no sense as mixed already allows anything
     *
     * @param  string  $compoundType
     * @param  mixed   $value
     * @return boolean
     */
    private static function validateCompoundType($compoundType, $value)
    {
        $types = explode('|', $compoundType);

        foreach ($types as $type) {
            if (self::validateType($type, $value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validates a value against a simple type
     * @param  string  $type
     * @param  mixed   $value
     * @return boolean
     */
    private static function validateType($type, $value)
    {
        switch ($type) {
            case 'mixed':
                return true;

            case 'integer':
            case 'boolean':
            case 'double':
            case 'string':
            case 'array':
            case 'resource':
            case 'null':
                return $type === self::getTypeOf($value);

            case 'true':
                return $value === true;

            case 'false':
                return $value === false;

            default:
                return is_a($value, $type);
        }
    }

    /**
     * @param  mixed  $value
     * @return string type|class
     */
    private static function getTypeOf($value)
    {
        if (is_object($value)) {
            return get_class($value);
        } else {
            return strtolower(gettype($value));
        }
    }
}
