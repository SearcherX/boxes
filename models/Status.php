<?php

namespace app\models;

enum Status
{
    case EXPECTED;
    case AT_WAREHOUSE;
    case PREPARED;
    case SHIPPED;

    public static function names(): array
    {
        $res = [];
        $statuses = self::cases();

        foreach ($statuses as $status) {
            $res[] = $status->getName();
        }

        return $res;
    }

    public static function getStatusByValue(?int $value): ?Status
    {
        if ($value === null)
            return null;

        $statuses = self::cases();

        foreach ($statuses as $status) {
            if ($status->getValue() === $value) {
                return $status;
            }
        }

        return null;
    }

    public function getName(): string
    {
        return match ($this) {
            Status::EXPECTED => 'Expected',
            Status::AT_WAREHOUSE => 'At warehouse',
            Status::PREPARED => 'Prepared',
            Status::SHIPPED => 'Shipped'
        };
    }

    public function getValue(): int
    {
        return match ($this) {
            Status::EXPECTED => 0,
            Status::AT_WAREHOUSE => 1,
            Status::PREPARED => 2,
            Status::SHIPPED => 3
        };
    }
}
