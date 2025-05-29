<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TableMstr extends Model
{
    /** @use HasFactory<\Database\Factories\TableMstrFactory> */
    use HasFactory;

    protected $table = 'table_mstr';
    protected $primaryKey = 'table_mstr_id';
    const CREATED_AT = 'table_mstr_ct';
    const UPDATED_AT = 'table_mstr_ut';

    protected $fillable = [
        'table_mstr_name',
        'table_mstr_desc',
        'table_mstr_barcode',
        'table_mstr_status',
        'table_mstr_branch',
        'table_mstr_cb',
        'table_mstr_uuid',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->table_mstr_uuid = Str::uuid();
        });
    }

    public static function rules()
    {
        return [
            'table_mstr_name' => 'required|string|max:255',
            'table_mstr_desc' => 'nullable|string|max:500',
            'table_mstr_barcode' => 'required|string|max:255',
            'table_mstr_branch' => 'nullable|string|max:255',
        ];
    }

    public static function validateUnique($data, $id = null)
    {
        $query = self::where('table_mstr_branch', $data['table_mstr_branch'])
            ->where('table_mstr_barcode', $data['table_mstr_barcode']);

        if ($id) {
            $query->where('table_mstr_id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            throw new \Exception('The combination of table_mstr_name and table_mstr_barcode must be unique.');
        }
    }

    public function branchMstr()
    {
        return $this->belongsTo(BranchMstr::class, 'table_mstr_branch', 'branch_mstr_id')->withDefault();
    }

    public function userMstr()
    {
        return $this->belongsTo(User::class, 'table_mstr_cb', 'user_mstr_id')->withDefault();
    }
}
