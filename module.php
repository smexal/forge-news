<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Abstracts\Module;
use \Forge\Core\Classes\Settings;

use function \Forge\Core\Classes\i;

class ForgeNews extends Module {

    public function setup() {
        $this->settings = Settings::instance();
        $this->id = "forge-news";
        $this->name = i('News', 'forge-news');
        $this->description = i('Module to add a News Collection and Components.', 'forge-news');
        //$this->image = $this->url().'assets/images/...';
    }

    public function start() {
        require_once($this->directory()."teaser-component.php");
        require_once($this->directory()."collection.php");
    }
}

?>
