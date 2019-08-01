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

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\CLICSHOPPING;
  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Tools\ServerInfo\Classes\ClicShoppingAdmin\OpCache;

  $CLICSHOPPING_ServerInfo = Registry::get('ServerInfo');
  $CLICSHOPPING_Template = Registry::get('TemplateAdmin');

  $CLICSHOPPING_Language->loadDefinitions('server_info');
  $info = CLICSHOPPING::getSystemInformation();
  $server = parse_url(CLICSHOPPING::getConfig('http_server'));

  Registry::set('OpCache', new OpCache());
  $opCache = Registry::get('OpCache');
?>
<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span
            class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . '/categories/server_info.gif', $CLICSHOPPING_ServerInfo->getDef('heading_title'), '40', '40'); ?></span>
          <span class="col-md-7 pageHeading"><?php echo $CLICSHOPPING_ServerInfo->getDef('heading_title'); ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>
  <table class="table table-sm">
    <tr>
      <td>
        <div style="padding-left: 10px" ;>
          <ul class="nav nav-tabs flex-column flex-sm-row" role="tablist" id="myTab">
            <li
              class="nav-item"><?php echo '<a href="#tab1" role="tab" data-toggle="tab" class="nav-link active">' . $CLICSHOPPING_ServerInfo->getDef('tab_info_server') . '</a>'; ?></li>
            <li
              class="nav-item"><?php echo '<a href="#tab2" role="tab" data-toggle="tab" class="nav-link">' . $CLICSHOPPING_ServerInfo->getDef('tab_info_php'); ?></a></li>
            <li
              class="nav-item"><?php echo '<a href="#tab3" role="tab" data-toggle="tab" class="nav-link">' . $CLICSHOPPING_ServerInfo->getDef('tab_info_op_cache'); ?></a></li>
          </ul>
          <div class="tabsClicShopping">
            <div class="tab-content">
              <!-- ########################################//-->
              <!--         ONGLET GENERAL SERVEUR         //-->
              <!-- ########################################//-->

              <div class="tab-pane active" id="tab1">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td class="mainTitle"><?php echo $CLICSHOPPING_ServerInfo->getDef('tab_info_php'); ?></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminformTitle">
                  <tr>
                    <?php
                      $server = parse_url(CLICSHOPPING::getConfig('http_server'));
                    ?>
                    <td>
                      <table border="0" width="100%" cellspacing="0" cellpadding="2">
                        <tr>
                          <td>
                            <table border="0" cellspacing="0" cellpadding="3">
                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_clicshopping_version'); ?></strong>
                                </td>
                                <td><?php echo CLICSHOPPING::getVersion(); ?></td>
                              </tr>
                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_server_host'); ?></strong>
                                </td>
                                <td><?php echo $server['host'] . ' (' . gethostbyname($server['host']) . ')'; ?></td>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_database_host'); ?></strong>
                                </td>
                                <td><?php echo CLICSHOPPING::getConfig('db_server') . ' (' . gethostbyname(CLICSHOPPING::getConfig('db_server')) . ')'; ?></td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_server_os'); ?></strong>
                                </td>
                                <td><?php echo $info['system']['os'] . ' ' . $info['system']['kernel']; ?></td>
                                <td><strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_database'); ?></strong>
                                </td>
                                <td><?php echo 'MySQL ' . $info['mysql']['version']; ?></td>
                              </tr>
                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_server_date'); ?></strong>
                                </td>
                                <td><?php echo $info['system']['date']; ?></td>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_database_date'); ?></strong>
                                </td>
                                <td><?php echo $info['mysql']['date']; ?></td>
                              </tr>
                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_server_up_time'); ?></strong>
                                </td>
                                <td colspan="3"><?php echo $info['system']['uptime']; ?></td>
                              </tr>
                              <tr>
                                <td colspan="4">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_http_server'); ?></strong>
                                </td>
                                <td><?php echo $info['system']['http_server']; ?></td>
                              </tr>

                              <tr>
                                <td>
                                  <strong><?php echo $CLICSHOPPING_ServerInfo->getDef('title_php_version'); ?></strong>
                                </td>
                                <td><?php echo $info['php']['version'] . ' (' . $CLICSHOPPING_ServerInfo->getDef('title_zend_version') . ' ' . $info['php']['zend'] . ')'; ?></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- ########################################//-->
              <!--            ONGLET Infos PHP            //-->
              <!-- ########################################//-->
              <div class="tab-pane" id="tab2">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td class="mainTitle"><?php echo $CLICSHOPPING_ServerInfo->getDef('server_info_php'); ?></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminformTitle">
                  <tr>
                    <td>
                      <table border="0" width="100%" cellspacing="0" cellpadding="2">
                        <tr>
                          <td>
                            <?php
                              if (function_exists('ob_start')) {
                                ?>
                                <style type="text/css">
                                  .p {
                                    text-align: left;
                                  }

                                  .e {
                                    background-color: #ccccff;
                                    font-weight: bold;
                                  }

                                  .h {
                                    background-color: #9999cc;
                                    font-weight: bold;
                                  }

                                  .v {
                                    background-color: #cccccc;
                                  }

                                  i {
                                    color: #666666;
                                  }

                                  hr {
                                    display: none;
                                  }
                                </style>
                                <?php
                                ob_start();
                                phpinfo();
                                $phpinfo = ob_get_contents();
                                ob_end_clean();

                                $phpinfo = str_replace('border: 1px', '', $phpinfo);
                                preg_match('/<body>(.*)<\/body>/is', $phpinfo, $regs);
                                echo $regs[1];
                              } else {
                                phpinfo();
                              }
                            ?>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
<?php

  /**
   * Fetch configuration and status information from OpCache
   */
  $config = opcache_get_configuration();
  $status = opcache_get_status();

  $stats = $status['opcache_statistics'];
  $hitRate = round($stats['opcache_hit_rate'], 2);

  $mem = $status['memory_usage'];
  $totalMemory = $config['directives']['opcache.memory_consumption'];
  $usedMemory = $mem['used_memory'];
  $freeMemory = $mem['free_memory'];
  $wastedMemory = $mem['wasted_memory'];

  $totalKeys = $stats['max_cached_keys'];
  $usedKeys = $stats['num_cached_keys'];
  $freeKeys = $totalKeys - $usedKeys;

  if (isset($_GET['invalidate'])) {
    opcache_invalidate($_GET['invalidate'], true);
//    header('Location: ' . 'index.php?A&Tools\ServerInfo&ServerInfo#scripts');
//    $CLICSHOPPING_ServerInfo->redirect('ServerInfo&ServerInfo#scripts');
  }

  if (isset($_GET['reset'])) {
    opcache_reset();
/*
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
*/
//    header('Location: index.php?A&Tools\ServerInfo&ServerInfo#scripts');
//    $CLICSHOPPING_ServerInfo->redirect('ServerInfo&ServerInfo#scripts');
  }
?>
<!-- ########################################//-->
<!--            ONGLET Infos OpCache            //-->
<!-- ########################################//-->
              <div class="tab-pane" id="tab3">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td class="mainTitle"><?php echo $CLICSHOPPING_ServerInfo->getDef('server_info_opcache'); ?></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminformTitle">
                  <tr>
                    <td>
                      <table border="0" width="100%" cellspacing="0" cellpadding="2">
                        <tr>
                          <td>
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                              <a class="navbar-brand" href="#">Menu</a>
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                  <a class="nav-item nav-link active" href="index.php?A&Tools\ServerInfo&ServerInfo#hits"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_hits'); ?> <span class="sr-only">(current)</span></a>
                                  <a class="nav-item nav-link" href="index.php?A&Tools\ServerInfo&ServerInfo#memory"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_memory'); ?></a>
                                  <a class="nav-item nav-link" href="index.php?A&Tools\ServerInfo&ServerInfo#keys"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_keys'); ?></a>
                                  <a class="nav-item nav-link" href="index.php?A&Tools\ServerInfo&ServerInfo#status"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_status'); ?></a>
                                  <a class="nav-item nav-link" href="index.php?A&Tools\ServerInfo&ServerInfo#status"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_configuration'); ?></a>
                                  <a class="nav-item nav-link" href="index.php?A&Tools\ServerInfo&ServerInfo#scripts"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_script'); ?></a>
                                </div>
                              </div>
                            </nav>

                            <div>
                              <div class="jumbotron">
                                <h1><?php echo $CLICSHOPPING_ServerInfo->getDef('test_opcache_dashoard'); ?></h1>
                                <p>OPcache: <?php echo $config['version']['version']; ?></p>
                              </div>
<?php
  //*******************
  // Hits
  //*******************
?>
                              <h5 id="hits"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_hits'); ?> <?php echo $hitRate; ?>%</h5>
                              <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" style="width: <?php echo $hitRate; ?>%">
                                  <span class="sr-only">Hits</span>
                                </div>
                                <div class="progress-bar progress-bar-danger" style="width: <?php echo (100 - $hitRate); ?>%">
                                  <span class="sr-only">Misses</span>
                                </div>
                              </div>
<?php
//*******************
// Memory
//*******************
?>
                              <div class="separator"></div>
                              <h5 id="memory"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_memory'); ?>  <?php echo $opCache->size_for_humans($wastedMemory + $usedMemory); ?> of <?php echo $opCache->size_for_humans($totalMemory); ?></h5>
                              <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger" style="width: <?php echo round(($wastedMemory / $totalMemory) * 100, 0); ?>%">
                                  <span class="sr-only">Wasted memory</span>
                                </div>
                                <div class="progress-bar progress-bar-warning" style="width: <?php echo round(($usedMemory / $totalMemory) * 100, 0); ?>%">
                                  <span class="sr-only">Used memory</span>
                                </div>
                                <div class="progress-bar progress-bar-success" style="width: <?php echo round(($freeMemory / $totalMemory) * 100, 0); ?>%">
                                  <span class="sr-only">Free memory</span>
                                </div>
                              </div>
<?php
  //*******************
  // Key
  //*******************
?>
                              <div class="separator"></div>
                              <h5 id="keys"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_keys'); ?> <?php echo $usedKeys; ?> of <?php echo $totalKeys; ?></h5>
                              <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-warning" style="width: <?php echo round(($usedKeys / $totalKeys) * 100, 0); ?>%">
                                  <span class="sr-only">Used keys</span>
                                </div>
                                <div class="progress-bar progress-bar-success" style="width: <?php echo round(($freeKeys / $totalKeys) * 100, 0); ?>%">
                                  <span class="sr-only">Free keys</span>
                                </div>
                              </div>
<?php
  //*******************
  // Status
  //*******************
?>
                              <div class="separator"></div>
                              <h2 id="status"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_status'); ?></h2>
                              <div class="table-responsive">
                                <table class="table table-striped table-hover">
<?php
      foreach ($status as $key => $value) {
        if ($key == 'scripts') {
          continue;
        }

        if (is_array($value)) {
          foreach ($value as $k => $v) {
            $v = $opCache->getStringFromPropertyAndValue($k, $v);
            $m = $opCache->getSuggestionMessage($k, $v);
?>
                                    <tr class="<?php echo $m ? 'danger' : ''; ?>"><th class="text-md-left"><?php echo $k; ?></th><td class="text-md-right"><?php echo $v; ?></td><td><?php echo $m; ?></td></tr>
<?php
          }
          continue;
        }
    $mess = $opCache->getSuggestionMessage($key, $value);
    $value = $opCache->getStringFromPropertyAndValue($key, $value);
?>
                                    <tr class="<?php echo $mess ? 'danger' : ''; ?>"><th class="text-md-left"><?php echo $key; ?></th><td class="text-md-right"><?php echo $value; ?></td><td><?php echo $mess; ?></td></tr>
<?php
      }
?>
                                </table>
                              </div>
<?php
  //*******************
  //Configuration
  //*******************
?>
                              <div class="separator"></div>
                              <h2 id="configuration"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_configuration'); ?></h2>
                              <div class="table-responsive">
                                <table class="table table-striped table-hover">
<?php foreach ($config['directives'] as $key => $value) {
      $mess =$opCache-> getSuggestionMessage($key, $value);
?>
                                    <tr class="<?php echo $mess ? 'danger' : ''; ?>" >
                                      <th class="text-md-left"><?php echo $key; ?></th>
                                      <td class="text-md-right"><?php echo $opCache->getStringFromPropertyAndValue($key, $value); ?></td>
                                      <td class="text-md-left"><?php echo $mess; ?></td>
                                    </tr>
 <?php
      }
?>
                                </table>
                              </div>
<?php
  //*******************
  // Script
  //*******************
?>
                              <div class="separator"></div>
                              <h2 id="scripts"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_script'); ?> (<?php echo count($status['scripts']); ?>) <a type="button" class="btn btn-success" href="index.php?A&Tools\ServerInfo&ServerInfo&reset"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_reset_all'); ?></a></h2>
                              <table class="table table-striped">
                                <tr>
                                  <th><?php echo $CLICSHOPPING_ServerInfo->getDef('text_options'); ?></th>
                                  <th><?php echo $CLICSHOPPING_ServerInfo->getDef('text_hits'); ?></th>
                                  <th><?php echo $CLICSHOPPING_ServerInfo->getDef('text_memory'); ?></th>
                                  <th><?php echo $CLICSHOPPING_ServerInfo->getDef('text_path'); ?></th>
                                </tr>
<?php
      uasort($status['scripts'], function ($a, $b) { return $a['hits'] < $b ['hits']; });
      $offset = null;
      $previousKey = null;

      foreach ($status['scripts'] as $key => $data) {
        $offset = min(
          $opCache->getOffsetWhereStringsAreEqual(
            (null === $previousKey) ? $key : $previousKey,
            $key
          ),
          (null === $offset) ? strlen($key) : $offset
        );
        $previousKey = $key;
      }

      foreach ($status['scripts'] as $key => $data) {
?>
                                    <tr>
                                      <td><a href="index.php?A&Tools\ServerInfo&ServerInfo&invalidate=<?php echo $data['full_path']; ?>"><?php echo $CLICSHOPPING_ServerInfo->getDef('text_invalidate'); ?></a></td>
                                      <td><?php echo $data['hits']; ?></td>
                                      <td><?php echo $opCache->size_for_humans($data['memory_consumption']); ?></td>
                                      <td><?php echo substr($data['full_path'], $offset - 1); ?></td>
                                    </tr>
<?php
      }
?>
                              </table>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
<?php
  //***********************************
  // extension
  //***********************************
  echo $CLICSHOPPING_Hooks->output('ServerInfo', 'PageTabContent', null, 'display');
?>
          </div>
        </div>
      </td>
    </tr>
  </table>
</div>