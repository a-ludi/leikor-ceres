<?php

namespace LEIKOR\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class ThemeServiceProvider extends ServiceProvider
{
    private static $templateKeyToViewMap =
    [
        // 'tpl.home'                          => 'Homepage.Homepage',
        // 'tpl.category.content'              => 'Category.Content.CategoryContent',
        'tpl.category.item'                 => 'Category.Item.CategoryItem',
        // 'tpl.category.blog'                 => 'PageDesign.PageDesign',
        // 'tpl.category.container'            => 'PageDesign.PageDesign',
        // 'tpl.item'                          => 'Item.SingleItemWrapper',
        'tpl.basket'                          => 'Item.SingleItemWrapper',
        // 'tpl.basket'                        => 'Basket.Basket',
        // 'tpl.checkout'                      => 'Checkout.CheckoutView',
        // 'tpl.checkout.category'             => 'Checkout.CheckoutCategory',
        // 'tpl.my-account'                    => 'MyAccount.MyAccountView',
        // 'tpl.my-account.category'           => 'MyAccount.MyAccountCategory',
        // 'tpl.confirmation'                  => 'Checkout.OrderConfirmation',
        // 'tpl.login'                         => 'Customer.Login',
        // 'tpl.register'                      => 'Customer.Register',
        // 'tpl.guest'                         => 'Customer.Guest',
        // 'tpl.password-reset'                => 'Customer.ResetPassword',
        // 'tpl.change-mail'                   => 'Customer.ChangeMail',
        // 'tpl.contact'                       => 'Customer.Contact',
        // 'tpl.search'                        => 'Category.Item.CategoryItem',
        // 'tpl.wish-list'                     => 'WishList.WishListView',
        // 'tpl.order.return'                  => 'OrderReturn.OrderReturnView',
        // 'tpl.order.return.confirmation'     => 'OrderReturn.OrderReturnConfirmation',
        // 'tpl.cancellation-rights'           => 'StaticPages.CancellationRights',
        // 'tpl.cancellation-form'             => 'StaticPages.CancellationForm',
        // 'tpl.legal-disclosure'              => 'StaticPages.LegalDisclosure',
        // 'tpl.privacy-policy'                => 'StaticPages.PrivacyPolicy',
        // 'tpl.terms-conditions'              => 'StaticPages.TermsAndConditions',
        // 'tpl.item-not-found'                => 'StaticPages.ItemNotFound',
        // 'tpl.page-not-found'                => 'StaticPages.PageNotFound',
        // 'tpl.newsletter.opt-out'            => 'Newsletter.NewsletterOptOut',
    ];

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
        $eventDispatcher->listen('IO.tpl.*', function (TemplateContainer $templateContainer, $templateData) {
            $this->replaceTemplate($templateContainer);
        });
    }

    /**
     * @param TemplateContainer $templateContainer
     */
    private function replaceTemplate(TemplateContainer $templateContainer)
    {
        $templateEvent  = $templateContainer->getTemplateKey();
        $template = substr($templateEvent, 4);

        if( array_key_exists($templateEvent, self::$templateKeyToViewMap) )
        {
            $templateConfig = self::$templateKeyToViewMap[$templateEvent];
            $templateContainer->setTemplate( 'LEIKOR::' . $templateConfig );
        }
    }
}
