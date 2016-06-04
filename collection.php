<?php
class ForgeNewsCollection extends DataCollection {
  public $permission = "manage.collection.sites";

  protected function setup() {
    $this->preferences['title'] = i('News');
    $this->preferences['all-title'] = i('Manage News');
    $this->preferences['add-label'] = i('Add news');
  }
}

?>
