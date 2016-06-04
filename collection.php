<?php
class ForgeNewsCollection extends DataCollection {
  public $permission = "manage.collection.sites";

  protected function setup() {
    $this->preferences['name'] = 'forge-news';
    $this->preferences['title'] = i('News', 'forge-news');
    $this->preferences['all-title'] = i('Manage News', 'forge-news');
    $this->preferences['add-label'] = i('Add news', 'forge-news');
    $this->preferences['single-item'] = i('News', 'forge-news');
  }
}

?>
