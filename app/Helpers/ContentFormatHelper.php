<?php
    namespace App\Helpers;

    use Parsedown;

    class ContentFormatHelper
    {
        public static function fromMarkdown(string $content): string
        {
            return (new Parsedown())->text($content);
        }


        public static function formatHtml(string $content): string
        {
            // paragraph tags.
            $content = self::formatLineBreaksAsHtml($content);

            // special HTML chars.
            $content = htmlspecialchars($content);

            return $content;
        }

        public static function formatLineBreaksAsHtml(string $content): string
        {
            return sprintf('<p>%s</p>', str_replace("\n\n", "</p><p>", $content));
        }
    }
