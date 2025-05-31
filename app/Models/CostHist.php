<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CostHist extends Model
{
    /** @use HasFactory<\Database\Factories\CostHistFactory> */
    use HasFactory;

    protected $table = 'cost_hist';
    protected $primaryKey = 'cost_hist_id';
    const CREATED_AT = 'cost_hist_ct';
    const UPDATED_AT = 'cost_hist_ut';


    protected $fillable = [
        'cost_hist_uuid',
        'cost_hist_type',
        'cost_hist_effdate',
        'cost_hist_inv',
        'cost_hist_curr',
        'cost_hist_rate',
        'cost_hist_amount',
        'cost_hist_rmks',
        'cost_hist_branch',
        'cost_hist_cb',
    ];

    public static function rules()
    {
        return [
            'cost_hist_type' => 'nullable|string',
            'cost_hist_effdate' => 'nullable|date',
            'cost_hist_inv' => 'nullable|string',
            'cost_hist_curr' => 'nullable|string',
            'cost_hist_rate' => 'nullable|string',
            'cost_hist_amount' => 'nullable|string',
            'cost_hist_rmks' => 'nullable|string',
            'cost_hist_branch' => 'nullable|numeric',
            'cost_hist_cb' => 'nullable|numeric',
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
}
