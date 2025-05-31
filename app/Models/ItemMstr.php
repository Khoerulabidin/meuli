<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemMstr extends Model
{
    /** @use HasFactory<\Database\Factories\ItemMstrFactory> */
    use HasFactory;

    protected $table = 'item_mstr';
    protected $primaryKey = 'item_mstr_id';
    const CREATED_AT = 'item_mstr_ct';
    const UPDATED_AT = 'item_mstr_ut';

    protected $fillable = [
        'item_mstr_id',
        'item_mstr_uuid',
        'item_mstr_code',
        'item_mstr_desc',
        'item_mstr_spec',
        'item_mstr_cat',
        'item_mstr_um',
        'item_mstr_status',
        'item_mstr_img',
        'item_mstr_cb',
    ];

    protected $casts = [
        'item_mstr_spec' => 'array',
    ];

    public static function rules()
    {
        return [
            'item_mstr_code' => 'nullable|string',
            'item_mstr_desc' => 'nullable|string',
            'item_mstr_spec' => 'nullable',
            'item_mstr_cat'  => 'nullable|string',
            'item_mstr_um'   => 'nullable|string',
            'item_mstr_img'  => 'nullable|image|max:2048',
        ];
    }

    public static function validateUnique($data, $id = null)
    {
        $query = self::where('item_mstr_code', $data['item_mstr_code'])
            ->where('item_mstr_code', $data['item_mstr_code']);

        // skip cek jika update
        if ($id) {
            $query->where('item_mstr_id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            throw new \Exception('The combination of item_mstr_id and item_mstr_code must be unique.');
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->item_mstr_uuid = Str::uuid();
        });
    }

    public function userMstr()
    {
        return $this->belongsTo(User::class, 'item_mstr_cb', 'user_mstr_id');
    }

    public function cat()
    {
        return $this->belongsTo(CodeMstr::class, 'item_mstr_cat', 'code_mstr_value')->where('code_mstr_fldname', 'item_cat');
    }

    public function um()
    {
        return $this->belongsTo(CodeMstr::class, 'item_mstr_um', 'code_mstr_value')->where('code_mstr_fldname', 'item_um')->withDefault();
    }
}
