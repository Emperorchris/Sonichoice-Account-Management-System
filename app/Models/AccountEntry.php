<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class AccountEntry extends Model
{
    /** @use HasFactory<\Database\Factories\AccountEntryFactory> */
    use HasFactory, SoftDeletes, HasUuids;

    // Use 'uuid' as the primary key for the model
    protected $primaryKey = 'uuid';

    // The primary key is not auto-incrementing
    public $incrementing = false;

    protected $guarded = [];
    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
