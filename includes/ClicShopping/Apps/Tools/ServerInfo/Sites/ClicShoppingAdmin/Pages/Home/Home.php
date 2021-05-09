<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Tools\ServerInfo\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Tools\ServerInfo\ServerInfo;

  class Home extends \ClicShopping\OM\PagesAbstract
  {
    public $app;

    protected function init()
    {
      $CLICSHOPPING_ServerInfo = new ServerInfo();
      Registry::set('ServerInfo', $CLICSHOPPING_ServerInfo);

      $this->app = Registry::get('ServerInfo');

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
