<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'original_filename',
        'extension',
        'mime_type',
        'bytes',
        'md5_hash',
        'extras',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function ogiginal_file()
    {
        return $this->belongsTo('W6\Model\File');
    }

    public function getSizeAttribute()
    {
        $size = $this->bytes;
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, ',', '.') . ' ' . $units[$power];
    }

    public function getOriginalFullFilenameAttribute()
    {
        return $this->original_filename . ($this->extension ? '.'.$this->extension : null);
    }

    public function getPublicUrlAttribute() {
        return \Storage::url($this->file_path);
    }
}
