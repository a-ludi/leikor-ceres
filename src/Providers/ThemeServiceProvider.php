<?php

namespace LEIKOR\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class ThemeServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {

    }

    /**
     * Boot a template for the footer that will be displayed in the template plugin instead of the original footer.
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        $this->replaceTemplate('IO.tpl.item', 'LEIKOR::Item.SingleItemWrapper');
        $this->replaceTemplate('tpl.category.item', 'LEIKOR::Item.SingleItemWrapper');
    }

    private function replaceTemplate(string $ioEvent, string $newTemplate)
    {
        $eventDispatcher->listen($ioEvent, function(TemplateContainer $container, $templateData)
        {
            $container->setTemplate($newTemplate);
            return false;
        }, 0);
    }
}
