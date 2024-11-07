<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug()
    {
        // Dijalankan saat model di-create
        static::creating(function (Model $model) {
            if (empty($model->slug)) {
                $model->slug = $model->generateUniqueSlug();
            }
        });

        // Opsional: Jika ingin update slug ketika nama berubah
        static::updating(function (Model $model) {
            if ($model->isDirty('name')) {
                $model->slug = $model->generateUniqueSlug();
            }
        });
    }

    public function generateUniqueSlug(): string
    {
        $slug = Str::slug($this->name);
        $originalSlug = $slug;
        $count = 2;

        // Loop sampai menemukan slug yang unik
        while ($this->otherRecordExistsWithSlug($slug)) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    private function otherRecordExistsWithSlug(string $slug): bool
    {
        $query = static::where('slug', $slug);

        // Jika sedang update, exclude ID saat ini
        if ($this->exists) {
            $query->where('id', '!=', $this->id);
        }

        return $query->exists();
    }

    // Opsional: Method untuk manual update slug
    public function updateSlug(): bool
    {
        $this->slug = $this->generateUniqueSlug();
        return $this->save();
    }
}
