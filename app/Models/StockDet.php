<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StockDet extends Model
{
    /** @use HasFactory<\Database\Factories\StockDetFactory> */
    use HasFactory;

    protected $table = 'stock_det';
    protected $primaryKey = 'stock_det_id';
    const CREATED_AT = 'stock_det_ct';
    const UPDATED_AT = 'stock_det_ut';

    protected $fillable = [
        'stock_det_uuid',
        'stock_det_mstr',
        'stock_det_item',
        'stock_det_um',
        'stock_det_qty',
        'stock_det_price',
        'stock_det_loc',
        'stock_det_branch',
        'stock_det_cb',
    ];
    public static function rules()
    {
        return [
            'stock_det_mstr' => 'required|integer',
            'stock_det_item' => 'required|string|max:255',
            'stock_det_um' => 'required|string|max:50',
            'stock_det_qty' => 'required|numeric',
            'stock_det_price' => 'required|numeric',
            'stock_det_loc' => 'nullable|string|max:100',
            'stock_det_branch' => 'nullable|string|max:100',
        ];
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->stock_det_uuid = Str::uuid();
        });
    }
    public function itemMstr()
    {
        return $this->belongsTo(ItemMstr::class, 'stock_det_item', 'item_mstr_id');
    }
    public function userMstr()
    {
        return $this->belongsTo(User::class, 'stock_det_cb', 'user_mstr_id');
    }
}
