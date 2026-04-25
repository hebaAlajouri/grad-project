<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    /**
     * اسم الجدول (اختياري)
     */
    protected $table = 'gallery_images';

    /**
     * إيقاف timestamps الافتراضية
     */
    public $timestamps = false;

    /**
     * الأعمدة القابلة للتعبئة
     */
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'uploaded_by',
        'is_active',
    ];

    /**
     * Casting
     */
    protected $casts = [
        'is_active' => 'boolean',
        'uploaded_at' => 'datetime',
    ];

    /**
     * العلاقة مع المستخدم (اللي رفع الصورة)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Scope: الصور الفعالة فقط
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: الصور غير الفعالة
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Helper: تفعيل الصورة
     */
    public function activate()
    {
        $this->update(['is_active' => true]);
    }

    /**
     * Helper: تعطيل الصورة
     */
    public function deactivate()
    {
        $this->update(['is_active' => false]);
    }

    /**
     * Helper: Toggle الحالة
     */
    public function toggleStatus()
    {
        $this->update([
            'is_active' => !$this->is_active
        ]);
    }
}