<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public function getValAttribute()
    {
        if ($this->attributes['val_string']) {
            return (string) $this->attributes['val_string'];
        } elseif ($this->attributes['val_float']) {
            return (int) $this->attributes['val_float'];
        }
        return null;
    }

    public function setValAttribute($val)
    {
        if (is_numeric($val)) {
            $key = 'val_float';
        } else {
            $key = 'val_string';
        }
        $this->attributes[$key] = $val;
    }

    public static function get(string $key)
    {
        return self::where('key', $key)->first();
    }
}
