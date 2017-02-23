<?php
namespace srt4rulez;

use Tracy\Dumper;
use Timber\Timber;

class TimberBarPanel implements \Tracy\IBarPanel
{
    protected $renderData      = [];
    protected $renderFiles     = [];
    protected $callingPhpFiles = [];

    /**
     * Use `add_filter` functions to get some of timbers data
     */
    public function __construct()
    {
        add_filter('timber/loader/render_data', [$this, 'setRenderData']);
        add_filter('timber_render_file', [$this, 'addRenderFile']);
        // add_filter('timber/calling_php_file', [$this, 'addCallingPhpFile']);
    }

    /**
     * Set $renderData from `timber/loader/render_data` filter
     *
     * @param array $data
     * @return array
     */
    public function setRenderData($data)
    {
        $this->renderData = $data;
        return $data;
    }

    /**
     * Add each rendered file to our $renderFiles array from the `timber_render_file`
     * filter
     *
     * @param string $file
     * @return string
     */
    public function addRenderFile($file)
    {
        $this->renderFiles[] = $file;
        return $file;
    }

    /**
     * Add each called php file to our $callingPhpFiles array from the `timber/calling_php_file`
     * filter
     *
     * @TODO: Add this to info and make it look good
     * @param string $file
     * @return string
     */
    public function addCallingPhpFile($file)
    {
        $this->callingPhpFiles[] = $file;
        return $file;
    }

    /**
     * Return the HTML for the tab portion of this bar panel
     *
     * @return string
     */
    public function getTab()
    {
        ob_start();

        require __DIR__ . '/../assets/tab.html';

        return ob_get_clean();
    }

    /**
     * Return the HTML for the panel portion of this bar panel
     *
     * @return string
     */
    public function getPanel()
    {
        ob_start();

        $info = [
            'Rendered Twig File(s)' => $this->renderFiles,
            'Version'               => Timber::$version,
            'Template Dirs'         => Timber::$dirname,
            'Twig Cache'            => Helpers::getHumanReadableBool(Timber::$twig_cache),
            'Cache'                 => Helpers::getHumanReadableBool(Timber::$cache),
            'Auto Meta'             => Helpers::getHumanReadableBool(Timber::$auto_meta),
            'Autoescape'            => Helpers::getHumanReadableBool(Timber::$autoescape),
        ];

        $context = Dumper::toHtml($this->renderData);

        require __DIR__ . '/../assets/panel.php';

        return ob_get_clean();
    }
}
