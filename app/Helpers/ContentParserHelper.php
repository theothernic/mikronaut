<?php
    namespace App\Helpers;

    use Parsedown;

    class ContentParserHelper
    {
        public static function fromMarkdown(string $content): string
        {
            return (new Parsedown())->text($content);
        }
    }
