<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Abstracts\Component;
use \Forge\Core\App\App;
use \Forge\Core\Classes\Utils;



class DisturberComponent extends Component {
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
                "key" => "cta_title",
                "type" => "text"
            ),
            array(
                "label" => i('Call to Action Link', 'forge-news'),
                "hint" => '',
                "key" => "cta_link",
                "type" => "url"
            ),
            array(
                "label" => i('Call to Action Target', 'forge-news'),
                "hint" => '',
                "key" => "cta_target",
                "type" => "select",
                "values" => [
                    '_self' => i('Same Windows', 'forge-news'),
                    '_blank' => i('New Window', 'forge-news')
                ]
            )
        );
        return array(
            'name' => i('Disturber Element', 'forge-news'),
            'description' => i('Fancy Disruptor Element'),
            'id' => 'forge-disturber',
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

        return App::instance()->render(DOC_ROOT.'modules/forge-news/templates/', "disturber", array(
            'title' => $this->getField('title'),
            'subtitle' => $this->getField('subtitle'),
            'cta_title' => $this->getField('cta_title'),
            'cta_link' => $this->getField('cta_link'),
            'cta_target' => $this->getField('cta_target'),
        ));
    }
}

?>
