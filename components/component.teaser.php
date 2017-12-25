<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Abstracts\Component;
use \Forge\Core\App\App;
use \Forge\Core\Classes\Utils;



class TeaserComponent extends Component {
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
                "label" => i('Limit the amount of news', 'forge-news'),
                "hint" => '',
                "key" => "limit",
                "type" => "number"
            ),
        );
        return array(
            'name' => i('News Teaser'),
            'description' => i('Tease latest news.'),
            'id' => 'forge-news',
            'image' => '',
            'level' => 'inner',
            'container' => false
        );
    }

    public function content() {
        $limit = 4;
        if($this->getField('limit')) {
            $limit = $this->getField('limit');
        }
        $collection = App::instance()->cm->getCollection('forge-news');
        $items = $collection->items(array(
            'order' => 'created',
            'order_direction' => 'desc',
            'limit' => $limit,
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
