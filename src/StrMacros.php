<?php

namespace Mrkatz\LaravelHelpers;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class StrMacros
{
    /**
     * Returns string netween two other strings
     *
     * @param string $subject
     * @param string $beginning
     *
     * @param null|string $end
     *
     * @return string
     *
     * @example  Str::between('--thing--', '--'); // returns "thing"
     * @example  Str::between('[thing]', '[', ']'); // returns "thing"
     */
    public function between($subject, $beginning, $end = null)
    {
        if (is_null($end)) {
            $end = $beginning;
        }

        return Str::before(Str::after($subject, $beginning), $end);
    }

    /**
     * Returns capture groups contained in the provided regex pattern.
     *
     * @param string $string
     * @param string $pattern
     *
     * @return mixed|null
     *
     * @example Str::extract('Jan-01-2019', '/Jan-(.*)-2019/'); // returns "01"
     */
    public function extract(string $string, string $pattern)
    {
        if (@preg_match($pattern, $string) === false) {
            $pattern = '#' . preg_quote($pattern, '#') . '#';
        }

        preg_match($pattern, $string, $matches);

        return $matches[1] ?? null;
    }


    /**
     * Checks the provided string against the provided regex pattern.
     *
     * @param string $string
     * @param string $pattern
     *
     * @return bool
     *
     * @example Str::match('Jan-1-2019', '/Jan-(.*)-2019/'); // returns true
     */
    public function match(string $string, string $pattern)
    {
        if (@preg_match($pattern, $string) === false) {
            $pattern = '#' . preg_quote($pattern, '#') . '#';
        }

        return preg_match($pattern, $string) === 1;
    }

    /**
     * A simple way to use validate a string using Laravel's built-in validation system.
     *
     * @param string $data
     * @param string $rules
     *
     * @return Collection
     *
     * @example Str::validate('calebporzio@aol.com', 'regex:/\.net$/|email|max:10');
     * returns: ["Format is invalid.", "May not be greater than 10 characters."]
     */
    public function validate(string $data, string $rules)
    {
        return Collection::make(
            Validator::make(['{placeholder}' => $data], ['{placeholder}' => $rules])
                     ->errors()
                     ->get('{placeholder}')
        )->map(function ($message) {
            return ucfirst(
                trim(
                    str_replace('The {placeholder}', '',
                                str_replace('The selected {placeholder}', 'This selection',
                                            $message)
                    )
                )
            );
        });
    }

    /**
     * Wrap a string within another string
     *
     * @param string $value
     * @param string $cap
     *
     * @return string
     *
     * @example Str::wrap('thing', '--'); // returns "--thing--"
     */
    public function wrap(string $value, string $cap)
    {
        return Str::start(Str::finish($value, $cap), $cap);
    }
}
