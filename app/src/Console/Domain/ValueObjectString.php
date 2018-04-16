<?php

namespace Console\Domain;

/**
 * Class ValueObjectString
 * @package Console\Domain
 */
abstract class ValueObjectString implements ValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->setValue($value);
    }

    abstract protected function setValue(string $value): void;

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
