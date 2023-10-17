<?php

namespace App\Enums\Traits;

use Illuminate\Support\Str;
use ReflectionClassConstant;
use App\Enums\Attributes\Label;

trait CanAccessLabel
{

    /**
     * @param self $enum
     */
    public  static function getLabel(self $enum): string
    {
        $ref = new ReflectionClassConstant(self::class, $enum->name);
        $classAttributes = $ref->getAttributes(Label::class);

        if (count($classAttributes) === 0) {
            return Str::headline($enum->name);
        }

        return $classAttributes[0]->newInstance()->label;
    }

    /**
     * @return array<string,string>
     */
    public static function labelArray(): array
    {
        /** @var array<string,string> $values */

        $values = [];
        foreach (self::cases() as $enum) {
            $values[$enum->value] = self::getLabel($enum);
        }

        return $values;
    }

    public function label(): string
    {
        return Self::getLabel($this);
    }
}
