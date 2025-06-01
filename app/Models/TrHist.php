<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrHist extends Model
{
    /** @use HasFactory<\Database\Factories\TrHistFactory> */
    use HasFactory;

    protected $table = 'tr_hist';
    protected $primaryKey = 'tr_hist_id';
    const CREATED_AT = 'tr_hist_ct';
    const UPDATED_AT = 'tr_hist_ut';

    protected $fillable = [
        'tr_hist_effdate',
        'tr_hist_type',
        'tr_hist_item',
        'tr_hist_loc',
        'tr_hist_branch',
        'tr_hist_rmks',
        'tr_hist_receiver',
        'tr_hist_cost',

       
        'tr_hist_cb',
        'tr_hist_uuid',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->branch_mstr_uuid = Str::uuid();
        });
    }
}
