<?php

namespace Forge\Modules\ForgeNews;

use Forge\Core\Classes\Builder;
use \Forge\Core\Abstracts\DataCollection;
use \Forge\Core\Classes\Localization;
use \Forge\Core\App\App;



class NewsCollection extends DataCollection {
  public $permission = "manage.collection.sites";

  protected function setup() {
    $this->preferences['name'] = 'forge-news';
    $this->preferences['title'] = i('News', 'forge-news');
    $this->preferences['all-title'] = i('Manage News', 'forge-news');
    $this->preferences['add-label'] = i('Add news', 'forge-news');
    $this->preferences['single-item'] = i('News', 'forge-news');
    $this->preferences['has_categories'] = true;
    $this->preferences['has_status'] = true;
    $this->preferences['has_image'] = true;
  }

  public function render($item) {
      $builder = new Builder('collection', $item->getID(), 'newsContentBuilder');
      $elements = $builder->getBuilderElements(Localization::getCurrentLanguage());

      $builderContent = '';
      foreach($elements as $element) {
          $builderContent.=$element->content();
      }

      return App::instance()->render(MOD_ROOT."forge-news/templates/", "detail", array(
          'title' => $item->getMeta('title'),
          'description' => $item->getMeta('description'),
          'text' => $item->getMeta('text'),
          'page_url' => $item->absUrl(),
          'page_identifier' => $this->preferences['name'].'_'.$item->id,
          'builderContent' => $builderContent,
          'comments' => $item->getMeta('comments') // todo: set per news entry
      ));
  }

    public function customEditContent($id) {
        $builder = new Builder('collection', $id, 'newsContentBuilder');
        return $builder->render();
    }

    public function custom_fields() {
    $this->addFields(array(
        array(
            'key' => 'text',
            'label' => i('Text', 'forge-news'),
            'multilang' => true,
            'type' => 'wysiwyg',
            'order' => 20,
            'position' => 'left',
            'hint' => ''
        ),
        array(
            'key' => 'comments',
            'label' => i('Allow Comments (Disqus)', 'forge-news'),
            'multilang' => true,
            'type' => 'checkbox',
            'order' => 20,
            'position' => 'right',
            'hint' => ''
        )
    ));
  }
}

?>
