<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    use HasFactory;

    /**
     * اسم الجدول (اختياري)
     */
    protected $table = 'analytics_events';

    /**
     * ما في updated_at، فقط created_at
     */
    public $timestamps = false;

    /**
     * الأعمدة القابلة للتعبئة
     */
    protected $fillable = [
        'event_type',
        'user_id',
        'metadata',
    ];

    /**
     * Casting
     */
    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: حسب نوع الحدث
     */
    public function scopeType($query, $type)
    {
        return $query->where('event_type', $type);
    }

    /**
     * Scope: أحداث مستخدم معين
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope: أحدث الأحداث
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('created_at');
    }

    /**
     * Scope: خلال فترة زمنية
     */
    public function scopeBetweenDates($query, $from, $to)
    {
        return $query->whereBetween('created_at', [$from, $to]);
    }

    /**
     * Helper: إنشاء event بسرعة 🔥
     */
    public static function log($type, $userId = null, $metadata = [])
    {
        return self::create([
            'event_type' => $type,
            'user_id' => $userId,
            'metadata' => $metadata,
        ]);
    }
}