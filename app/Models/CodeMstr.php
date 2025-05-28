<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CodeMstr extends Model
{
    /** @use HasFactory<\Database\Factories\CodeMstrFactory> */
    use HasFactory;

    protected $table = 'code_mstr';
    protected $primaryKey = 'code_mstr_id';
    const CREATED_AT = 'code_mstr_ct';
    const UPDATED_AT = 'code_mstr_ut';

    protected $fillable = [
        'code_mstr_fldname',
        'code_mstr_value',
        'code_mstr_cmmt',
        'code_mstr_cmmt2',
        'code_mstr_ct',
        'code_mstr_ut',
        'code_mstr_cb',
        'code_mstr_uuid',
        'code_mstr_branch',
    ];

    public static function rules()
    {
        return [
            'code_mstr_fldname' => 'required|string',
            'code_mstr_value' => 'required|string',
        ];
    }

    public static function validateUnique($data, $id = null)
    {
        $query = self::where('code_mstr_fldname', $data['code_mstr_fldname'])
            ->where('code_mstr_value', $data['code_mstr_value']);

        // skip cek jika update
        if ($id) {
            $query->where('code_mstr_id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            throw new \Exception('The combination of code_mstr_fldname and code_mstr_value must be unique.');
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->code_mstr_uuid = Str::uuid();
        });
    }

    public function userMstr()
    {
        return $this->belongsTo(User::class, 'code_mstr_cb', 'user_mstr_id')->withDefault();
    }
}
