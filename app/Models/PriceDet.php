<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PriceDet extends Model
{
    /** @use HasFactory<\Database\Factories\PriceDetFactory> */
    use HasFactory;

    protected $table = 'price_det';
    protected $primaryKey = 'price_det_id';
    const CREATED_AT = 'price_det_ct';
    const UPDATED_AT = 'price_det_ut';

    protected $fillable = [
        'price_det_uuid',
        'price_det_mstr',
        'price_det_item',
        'price_det_um',
        'price_det_cost',
        'price_det_cb',
    ];

    public static function rules()
    {
        return [
            'price_det_mstr' => 'nullable|numeric',
            'price_det_item' => 'nullable|string',
            'price_det_um' => 'nullable|string',
            'price_det_cost'  => 'nullable|numeric',
            'price_det_cb'   => 'nullable|date',
        ];
    }

    public static function validateUnique($data, $id = null)
    {
        $query = self::where('price_det_item', $data['price_det_item'])
            ->where('price_det_item', $data['price_det_item']);

        // skip cek jika update
        if ($id) {
            $query->where('price_det_id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            throw new \Exception('The combination of price_det_id and price_det_item must be unique.');
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->price_det_uuid = Str::uuid();
        });
    }

    public function priceMstr()
    {
        return $this->hasOne(PriceMstr::class, 'price_det_mstr', 'price_mstr_id')->withDefault();
    }

    public function userMstr()
    {
        return $this->belongsTo(User::class, 'price_det_cb', 'user_mstr_id');
    }

    public function itemMstr()
    {
        return $this->belongsTo(ItemMstr::class, 'price_det_item', 'item_mstr_id')->withDefault();
    }

    public function um()
    {
        return $this->belongsTo(CodeMstr::class, 'price_det_um', 'code_mstr_value')->where('code_mstr_fldname', 'item_um');
    }
}
