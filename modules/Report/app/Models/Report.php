<?php

namespace Modules\Report\app\Models;

use App\Models\User;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Report\app\Enums\StatusEnum;

class Report extends Model
{
    use Uuid, HasFactory;

    protected $fillable = [
        // 'title',
        // 'attach',
        // 'description',
        // 'comment',

        'tgl',
        'unit',
        'equipment',
        'deskripsi_pekerjaan',
        'nama',
        'drafter',
        'upload_foto',
        'lokasi_barang',
        'status',
        'user_id',
        'prioritas',
    ];

    protected $hidden = [
        'status',
        'user_id',
        // 'comment',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected static function newFactory()
    {
        return \Modules\Report\database\factories\Report\ReportFactory::new();
    }

    /**
     * attribute
     */
    public function uploadFoto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value)
        );
    }

    /**
     * relation eloquent
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function has_drafter()
    {
        return $this->belongsTo(User::class, 'drafter');
    }

    /**
     * proced columns
     */
    public function getStatusColor()
    {
        return $this->status->value === 'Belom' ? 'secondary'
            : ($this->status->value === 'IP' ? 'primary'
                : ($this->status->value === 'Ok' ? 'success'
                    : ''));
    }

    /**
     * prioritas
     */
    public function getPrioritasColor()
    {
        return $this->prioritas == 'emergency' ? 'danger'
            : ($this->prioritas == 'high' ? 'warning'
                : ($this->prioritas == 'medium' ? 'info'
                    : ($this->prioritas == 'low' ? 'success'
                        : '')));
    }
}
