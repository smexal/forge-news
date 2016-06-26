<?php
class ForgeNewsCollection extends DataCollection {
  public $permission = "manage.collection.sites";

  protected function setup() {
    $this->preferences['name'] = 'forge-news';
    $this->preferences['title'] = i('News', 'forge-news');
    $this->preferences['all-title'] = i('Manage News', 'forge-news');
    $this->preferences['add-label'] = i('Add news', 'forge-news');
    $this->preferences['single-item'] = i('News', 'forge-news');

    $this->custom_fields();
  }

  private function custom_fields() {
    $this->addFields(array(
        array(
            'key' => 'text',
            'label' => i('Text', 'core'),
            'multilang' => true,
            'type' => 'wysiwyg',
            'order' => 20,
            'position' => 'left',
            'hint' => ''
        ),
    ));
  }
}

?>
