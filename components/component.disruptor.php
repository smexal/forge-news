<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Abstracts\Component;
use \Forge\Core\App\App;
use \Forge\Core\Classes\Utils;



class DisruptorComponent extends Component {
    public $settings = array();

    public function prefs() {
        $this->settings = array(
            array(
                "label" => i('Title', 'forge-news'),
                "hint" => '',
                "key" => "title",
                "type" => "text"
            ),
            array(
                "label" => i('Subtitle', 'forge-news'),
                "hint" => '',
                "key" => "subtitle",
                "type" => "text"
            ),
            array(
                "label" => i('Call to Action Title', 'forge-news'),
                "hint" => '',
                "key" => "subtitle",
                "type" => "text"
            ),
            array(
                "label" => i('Call to Action Link', 'forge-news'),
                "hint" => '',
                "key" => "subtitle",
                "type" => "url"
            )
        );
        return array(
            'name' => i('Disruptor Element', 'forge-news'),
            'description' => i('Fancy Disruptor Element'),
            'id' => 'forge-disruptor',
            'image' => '',
            'level' => 'inner',
            'container' => false
        );
    }

    public function content() {
        $collection = App::instance()->cm->getCollection('forge-news');
        $items = $collection->items(array(
            'order' => 'created',
            'order_direction' => 'desc',
            'limit' => 4,
            'status' => 'published'
        ));
        $news_items = array();
        foreach($items as $item) {
            array_push($news_items, array(
                'id' => $item->id,
                'title' => $item->getMeta('title'),
                'description' => $item->getMeta('description'),
                'date' => Utils::dateFormat($item->getCreationDate()),
                'url' => $item->url()
            ));
        }

        return App::instance()->render(DOC_ROOT.'modules/forge-news/templates/', "teaser", array(
            'title' => $this->getField('title'),
            'news' => $news_items
        ));
    }
}

?>
