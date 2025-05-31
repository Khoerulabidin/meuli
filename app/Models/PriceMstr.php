<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceMstr extends Model
{
    /** @use HasFactory<\Database\Factories\PriceMstrFactory> */
    use HasFactory;

    protected $table = 'price_mstr';
    protected $primaryKey = 'price_mstr_id';
    const CREATED_AT = 'price_mstr_ct';
    const UPDATED_AT = 'price_mstr_ut';

    protected $fillable = [
        'price_mstr_uuid',
        'price_mstr_item',
        'price_mstr_um',
        'price_mstr_nbr',
        'price_mstr_cost',
        'price_mstr_start',
        'price_mstr_expire',
        'price_mstr_status',
        'price_mstr_cb',
    ];

    public static function rules()
    {
        return [
            'price_mstr_item' => 'nullable|string',
            'price_mstr_um' => 'nullable|string',
            'price_mstr_nbr' => 'nullable|string',
            'price_mstr_cost'  => 'nullable|numeric',
            'price_mstr_start'   => 'nullable|date',
            'price_mstr_expire'  => 'nullable|date',
        ];
    }

    public static function validateUnique($data, $id = null)
    {
        $query = self::where('price_mstr_nbr', $data['price_mstr_nbr'])
            ->where('price_mstr_nbr', $data['price_mstr_nbr']);

        // skip cek jika update
        if ($id) {
            $query->where('price_mstr_id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            throw new \Exception('The combination of price_mstr_id and price_mstr_nbr must be unique.');
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->price_mstr_uuid = Str::uuid();
        });
    }

    public function userMstr()
    {
        return $this->belongsTo(User::class, 'price_mstr_cb', 'user_mstr_id');
    }

    public function itemMstr()
    {
        return $this->belongsTo(CodeMstr::class, 'price_mstr_i', 'code_mstr_value')->where('code_mstr_fldname', 'item_cat');
    }

    public function um()
    {
        return $this->belongsTo(CodeMstr::class, 'price_mstr_um', 'code_mstr_value')->where('code_mstr_fldname', 'item_um');
    }
}
