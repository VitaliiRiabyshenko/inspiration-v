<?php


namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ApplicationFilter extends AbstractFilter
{
    public const APPLICATION_STATUS = 'application_status';
    public const FULL_NAME = 'full_name';
    public const EMAIL = 'email';
    public const COUNTRY = 'country';
    public const VISA_TYPES = 'visa_types';

    protected function getCallbacks(): array
    {
        return [
            self::APPLICATION_STATUS => [$this, 'applicationStatus'],
            self::FULL_NAME => [$this, 'fullName'],
            self::EMAIL => [$this, 'email'],
            self::COUNTRY => [$this, 'country'],
            self::VISA_TYPES => [$this, 'visaTypes'],
        ];
    }

    public function applicationStatus(Builder $builder, $value)
    {
        $builder->where('application_status', 'like', "%{$value}%");
    }

    public function fullName(Builder $builder, $value)
    {
        $builder->where('full_name', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function country(Builder $builder, $value)
    {
        $builder->where('country', 'like', "%{$value}%");
    }

    public function visaTypes(Builder $builder, $value)
    {
        $builder->where('VISA_TYPES', 'like', "%{$value}%");
    }

}