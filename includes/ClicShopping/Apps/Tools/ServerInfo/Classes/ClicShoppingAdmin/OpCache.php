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

  namespace ClicShopping\Apps\Tools\ServerInfo\Classes\ClicShoppingAdmin;

  class OpCache
  {
    /**
     * Turn bytes into a human readable format
     * @param $bytes
     * @return string
     */
    public function size_for_humans(float $bytes):string
    {
      if ($bytes > 1048576) {
        return sprintf("%.2f&nbsp;MB", $bytes/1048576);
      } elseif ($bytes > 1024) {
        return sprintf("%.2f&nbsp;kB", $bytes/1024);
      } else {
        return sprintf("%d&nbsp;bytes", $bytes);
      }
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function getOffsetWhereStringsAreEqual($a, $b):int
    {
      $i = 0;

      while (strlen($a) && strlen($b) && strlen($a) > $i && $a[$i] === $b[$i]) {
        $i++;
      }

      return $i;
    }

    /**
     * @param $property
     * @param $value
     * @return string
     */
    public function getSuggestionMessage(string $property, bool $value):string
    {
      switch ($property) {
        case 'opcache_enabled':
          return $value ? '' : '<span class="fa fas"></span> You should enabled opcache';
          break;
        case 'cache_full':
          return $value ? '<span class="fa fas-search"></span> You should increase opcache.memory_consumption' : '';
          break;
        case 'opcache.validate_timestamps':
          return $value ? '<span class="fa fas-search"></span> If you are in a production environment you should disabled it' : '';
          break;
      }
      return '';
    }

    /**
     * @param $property
     * @param $value
     * @return string
     */
    public function getStringFromPropertyAndValue(string $property, bool $value) :?bool
    {
      if ($value === false) {
        return 'false';
      }
      if ($value === true) {
        return 'true';
      }
      switch ($property) {
        case 'used_memory':
        case 'free_memory':
        case 'wasted_memory':
        case 'opcache.memory_consumption':
          return $this->size_for_humans($value);
          break;
        case 'current_wasted_percentage':
        case 'opcache_hit_rate':
          return number_format($value, 2).'%';
          break;
        case 'blacklist_miss_ratio':
          return number_format($value, 2);
          break;
      }

      return $value;
    }


//***************************
// MemCache
//***************************

    public function val_to_str($value) {
      return htmlentities(var_export($value, true));
    }

    public function is_action($action) {
      return isset( $_GET['action']) && $_GET['action'] == $action;
    }

    public function percentage( $a, $b ) {
      return ( $a / $b ) * 100;
    }

    public function has_key( $arr, $key1=null, $key2=null, $key3=null ) {
      if( isset( $arr[$key1] ) )
        return $key1;

      if( isset( $arr[$key2] ) )
        return $key2;

      if( isset( $arr[$key3] ) )
        return $key3;

      return null;
    }

    public function get_key( $arr, $key1=null, $key2=null, $key3=null ) {
      $key = has_key($arr, $key1, $key2, $key3 );

      if( empty( $key ) )
        return null;

      return $arr[$key];
    }

    public function memcache_mem( $key ) {
      global $memcache_stats;

      if( $key == 'free' )
        return memcache_mem('total') - memcache_mem('used');

      if( $key == 'total')
        $key = 'limit_maxbytes';

      if( $key == 'used' )
        $key = 'bytes';

      if( $key == 'hash' )
        $key = 'hash_bytes';

      if (!is_array($memcache_stats))
        return 0;

      $result = 0;

      foreach( $memcache_stats as $server )
        $result += empty($server[$key]) ? 0 : $server[$key];

      return $result;
    }

    public function memcache_get_key($key, &$found = false) {
      global $memcache;
      global $memcacheVersion;

      if (empty($key)) {
        $found = false;
        return false;
      }

      if ($memcacheVersion == 'memcache') {
        $val = $memcache->get(array($key));
        $found = count($val) > 0;
        return $found ? array_pop($val) : false;
      }

      $val = $memcache->get($key, null, Memcached::GET_EXTENDED);
      $found = $val !== false;

      return $val['value'];
    }

    public function memcache_ref() {
      global $memcache;
      global $memcacheVersion;

      // Listing keys is not supported using the legacy Memcache module
      // PHP 7 and newer do not support this extension anymore
      if ($memcacheVersion != 'memcached')
        return array();
      $items = $memcache->getAllKeys();

      if (!is_array($items))
        return array();
      $keys = array();

      foreach( $items as $item ) {
        $keys[$item] = memcache_get_key($item);
      }
      return $keys;
    }
  }