<?php namespace Anomaly\SettingsModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class SettingsModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule
 */
class SettingsModulePlugin extends Plugin
{

    /**
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new SettingsModulePlugin instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('setting_get', [$this->settings, 'get'])
        ];
    }
}