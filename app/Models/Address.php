<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * اسم الجدول (اختياري إذا نفس الاسم)
     */
    protected $table = 'addresses';

    /**
     * الأعمدة المسموح تعبئتها
     */
      public $timestamps = false;

    protected $fillable = [
        'user_id',
        'label',
        'street',
        'city',
        'region',
        'postal_code',
        'country',
        'is_default',
    ];

    /**
     * تحويل القيم (Casting)
     */
    protected $casts = [
        'is_default' => 'boolean',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: العناوين الافتراضية فقط
     */
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Helper: تعيين كعنوان افتراضي
     */
    public function setAsDefault()
    {
        self::where('user_id', $this->user_id)
            ->update(['is_default' => false]);

        $this->update(['is_default' => true]);
    }
}