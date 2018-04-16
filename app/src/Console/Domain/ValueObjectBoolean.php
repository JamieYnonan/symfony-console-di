<?php

namespace Console\Domain;

/**
 * Class ValueObjectBoolean
 * @package Console\Domain
 */
abstract class ValueObjectBoolean implements ValueObject
{
    protected $value;

    public function __construct(bool $value)
    {
        $this->setValue($value);
    }

    abstract protected function setValue(bool $value): void;

    public function value(): bool
    {
        $this->value;
    }
}
