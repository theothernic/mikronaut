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
            $content = self::formatLineBreaksAsParagraphs($content);
            $content = self::removeStrayBreakTags($content);
            $content = self::formatRemoveEmptyParagraphs($content);
            // special HTML chars.
            $content = htmlspecialchars($content);

            return $content;
        }

        public static function convertBreakToParagraphTag(string $content): string
        {
            return sprintf('<p>%s</p>', str_replace("<br /><br />", "</p><p>", $content));
        }

        public static function removeStrayBreakTags(string $content): string
        {

            $content = str_replace('<br />', '', $content);
            $content = str_replace('<br>', '', $content);

            return $content;
        }

        public static    function formatRemoveEmptyParagraphs(string $content): string
        {
            return str_replace("<p></p>", '', $content);
        }

        public static function formatLineBreaksAsParagraphs(string $content): string
        {
            return sprintf('<p>%s</p>', str_replace("\r\n", "</p><p>", $content));
        }
    }
