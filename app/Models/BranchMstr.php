<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BranchMstr extends Model
{
    /** @use HasFactory<\Database\Factories\BranchMstrFactory> */
    use HasFactory;

    protected $table = 'branch_mstr';
    protected $primaryKey = 'branch_mstr_id';
    const CREATED_AT = 'branch_mstr_ct';
    const UPDATED_AT = 'branch_mstr_ut';

    protected $fillable = [
        'branch_mstr_name',
        'branch_mstr_joined',
        'branch_mstr_addr1',
        'branch_mstr_addr2',
        'branch_mstr_telp',
        'branch_mstr_fax',
        'branch_mstr_email',
        'branch_mstr_pic',
        'branch_mstr_sosmed1', //instagram
        'branch_mstr_sosmed2', //facebook
        'branch_mstr_sosmed3', //X
        'branch_mstr_sosmed4', //tiktok

        'branch_mstr_img',
        'branch_mstr_profile',
        'branch_mstr_cb',
        'branch_mstr_uuid',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->branch_mstr_uuid = Str::uuid();
        });
    }
}
