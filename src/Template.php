<?php
namespace CartFrame;

class Template
{
    static function render(string $template, array $placeholder, $directory = '../templates/'): string
    {
        ob_start();
        include $directory . $template;
        $pageContent = ob_get_contents();
        ob_end_clean();

        return $pageContent;
    }
}