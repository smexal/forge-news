<?php

namespace Forge\Modules\ForgeNews;

use Forge\Core\App\App;
use Forge\Core\Abstracts\Module;
use Forge\Core\Classes\Settings;



class ForgeNews extends Module {
    public $settings;

    public function setup() {
        $this->settings = Settings::instance();
        $this->id = "forge-news";
        $this->name = i('News', 'forge-news');
        $this->description = i('Module to add a News Collection and Components.', 'forge-news');
        //$this->image = $this->url().'assets/images/...';
    }

    public function start() {
        App::instance()->tm->theme->addStyle(MOD_ROOT . "forge-news/css/disturber.less");
        App::instance()->tm->theme->addStyle(MOD_ROOT . "forge-news/css/bigteaser.less");
    }
}
