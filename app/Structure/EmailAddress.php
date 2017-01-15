<?php

namespace GymForGym\Structure;

class EmailAddress
{
    /** @var string */
    private $raw;

    /**
     * @param string $raw
     */
    public function __construct(string $raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return (bool) filter_var($this->raw, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->raw;
    }

    /**
     * @return string
     */
    public function userName(): string
    {
        return $this->parts()[0];
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->parts()[1];
    }

    /**
     * @return array
     */
    private function parts(): array
    {
        return explode('@', $this->raw);
    }
}
