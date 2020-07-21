<?php
namespace CartFrame;

class Template
{
    /**
     * @param array $placeholder Template placeholders
     * @param string $file Template file, if not set called page script name will be used
     * @param string $directory Template directory
     * @return string Template content
     */
    static function render(array $placeholder = [], string $file = '', $directory = '../templates/'): string
    {
        $templateFile = ($file)? : basename($_SERVER['SCRIPT_NAME']);
        $templatePath = $directory . $templateFile;

        if(!file_exists($templatePath)) {
            throw new \RuntimeException('Template file "' . $templatePath . '" not found');
        }

        ob_start();
        include $templatePath;
        $pageContent = ob_get_contents();
        ob_end_clean();

        return $pageContent;
    }
}