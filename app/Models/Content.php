<?php
    namespace App\Models;


    use App\Models\Dtos\ContentDto;
    use Illuminate\Database\Eloquent\Concerns\HasUlids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Content extends Model implements IDtoable
    {
        use HasUlids, SoftDeletes;

        public const TYPES = [
            'post' => 'post',
            'image' => 'image',
            'page' => 'page'
        ];

        public const FORMATS = [
            'html' => 'HTML',
            'text' => 'Text',
            'mk' => 'Markdown',
            'hb' => 'Handlebars'
        ];

        public const VISIBILITY = [
            'public' => 'public',
            'private' => 'private',
            'keyed' => 'keyed'
        ];


        protected $table = 'content';
        protected $fillable = [
            'author_id',
            'type',
            'title',
            'body',
            'format',
            'visibility',
            'visibility_key',
            'publish_at'
        ];

        protected $hidden = [];

        public function author()
        {
            return $this->belongsTo(User::class);
        }

        public function getDto() : ContentDto
        {
            return new ContentDto($this->getAttributes());
        }
    }
