<?php

class ForgeNewsTeaser extends Component {
    public $settings = array();

    public function prefs() {
        $this->settings = array(
            array(
                "label" => i('Title'),
                "hint" => '',
                "key" => "title",
                "type" => "text"
            )
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
        $collection = App::instance()->cm->getCollection('forge-news');
        $items = $collection->items(array(
            'order' => 'created',
            'order_direction' => 'desc',
            'limit' => 4
        ));
        $news_items = array();
        foreach($items as $item) {
            $news = $collection->getItem($item['id']);
            array_push($news_items, array(
                'id' => $item['id'],
                'title' => $news->getMeta('title'),
                'description' => $news->getMeta('description'),
                'date' => Utils::dateFormat($item['created'])
            ));
        }

        return App::instance()->render(DOC_ROOT.'modules/forge-news/templates/', "teaser", array(
            'title' => $this->getField('title'),
            'news' => $news_items
        ));
    }

}

?>
