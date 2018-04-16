<?php

namespace Console\Domain;

/**
 * Class ValueObjectInt
 * @package Console\Domain
 */
abstract class ValueObjectInt implements ValueObject
{
    protected $value;

    public function __construct(int $value)
    {
        $this->setValue($value);
    }

    abstract protected function setValue(int $value): void;

    public function value(): int
    {
        return $this->value;
    }
}
