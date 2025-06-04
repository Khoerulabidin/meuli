<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

        static::creating(function ($tableMstr) {
            $tableMstr->table_mstr_uuid = Str::uuid();
            $qrCodePath = 'qrcodes/' . $tableMstr->table_mstr_uuid . '.svg';

            $directory = storage_path('app/public/qrcodes');
            if (!file_exists($directory)) {
                mkdir($directory, 0775, true);
            }

            $fullUrl = url('/?table=' . $tableMstr->table_mstr_uuid);

            QrCode::format('svg')
                ->size(300)
                ->style('round')
                ->eye('circle')
                ->gradient(10, 80, 160, 100, 180, 220, 'diagonal')
                ->margin(1)
                ->generate(
                    $fullUrl,
                    storage_path('app/public/' . $qrCodePath)
                );

            $tableMstr->table_mstr_barcode = $qrCodePath;
        });

        static::deleting(function ($tableMstr) {
            if ($tableMstr->table_mstr_barcode) {
                Storage::disk('public')->delete($tableMstr->table_mstr_barcode);
            }
        });
    }

    public static function rules()
    {
        return [
            'table_mstr_name' => 'required|string|max:255',
            'table_mstr_desc' => 'nullable|string|max:500',
            'table_mstr_branch' => 'nullable|string|max:255',
        ];
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
