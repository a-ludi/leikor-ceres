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
        // 'tpl.home'                          => ['Homepage.Homepage',                      GlobalContext::class],
        // 'tpl.category.content'              => ['Category.Content.CategoryContent',       CategoryContext::class],
        'tpl.category.item'                 => ['Category.Item.CategoryItem',             CategoryItemContext::class],
        // 'tpl.category.blog'                 => ['PageDesign.PageDesign',                  GlobalContext::class],
        // 'tpl.category.container'            => ['PageDesign.PageDesign',                  GlobalContext::class],
        'tpl.item'                          => ['Item.SingleItemWrapper',                 SingleItemContext::class],
        // 'tpl.basket'                        => ['Basket.Basket',                          GlobalContext::class],
        // 'tpl.checkout'                      => ['Checkout.CheckoutView',                  CheckoutContext::class],
        // 'tpl.checkout.category'             => ['Checkout.CheckoutCategory',              CheckoutContext::class],
        // 'tpl.my-account'                    => ['MyAccount.MyAccountView',                GlobalContext::class],
        // 'tpl.my-account.category'           => ['MyAccount.MyAccountCategory',            CategoryContext::class],
        // 'tpl.confirmation'                  => ['Checkout.OrderConfirmation',             OrderConfirmationContext::class],
        // 'tpl.login'                         => ['Customer.Login',                         GlobalContext::class],
        // 'tpl.register'                      => ['Customer.Register',                      GlobalContext::class],
        // 'tpl.guest'                         => ['Customer.Guest',                         GlobalContext::class],
        // 'tpl.password-reset'                => ['Customer.ResetPassword',                 PasswordResetContext::class],
        // 'tpl.change-mail'                   => ['Customer.ChangeMail',                    ChangeMailContext::class],
        // 'tpl.contact'                       => ['Customer.Contact',                       GlobalContext::class],
        // 'tpl.search'                        => ['Category.Item.CategoryItem',             ItemSearchContext::class],
        // 'tpl.wish-list'                     => ['WishList.WishListView',                  ItemWishListContext::class],
        // 'tpl.order.return'                  => ['OrderReturn.OrderReturnView',            OrderReturnContext::class],
        // 'tpl.order.return.confirmation'     => ['OrderReturn.OrderReturnConfirmation',    GlobalContext::class],
        // 'tpl.cancellation-rights'           => ['StaticPages.CancellationRights',         GlobalContext::class],
        // 'tpl.cancellation-form'             => ['StaticPages.CancellationForm',           GlobalContext::class],
        // 'tpl.legal-disclosure'              => ['StaticPages.LegalDisclosure',            GlobalContext::class],
        // 'tpl.privacy-policy'                => ['StaticPages.PrivacyPolicy',              GlobalContext::class],
        // 'tpl.terms-conditions'              => ['StaticPages.TermsAndConditions',         GlobalContext::class],
        // 'tpl.item-not-found'                => ['StaticPages.ItemNotFound',               GlobalContext::class],
        // 'tpl.page-not-found'                => ['StaticPages.PageNotFound',               GlobalContext::class],
        // 'tpl.newsletter.opt-out'            => ['Newsletter.NewsletterOptOut',            GlobalContext::class]
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
        $eventDispatcher->listen('IO.tpl.item', function(TemplateContainer $container, $templateData)
        {
            $container->setTemplate('LEIKOR::Item.SingleItemWrapper');
            return false;
        }, 0);

        $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData)
        {
            $container->setTemplate('LEIKOR::Category.Item.CategoryItem');
            return false;
        }, 0);
    }
}
