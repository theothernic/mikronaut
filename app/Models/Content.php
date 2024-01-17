<?php
    namespace App\Models;


    use App\Models\Dtos\ContentDto;
    use Illuminate\Database\Eloquent\Model;

    class Content extends Model
    {
        protected $table = 'content';
        protected $fillable = [];

        protected $hidden = [];

        public function getDto() : ContentDto
        {
            return new ContentDto($this->getAttributes());
        }
    }
