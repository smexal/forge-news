<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Classes\Media;
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
                "label" => i('Tiny Image', 'forge-news'),
                "hint" => '',
                "key" => "image",
                "type" => "image"
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
            'description' => i('Fancy Disruptor Element', 'forge-news'),
            'id' => 'forge-disturber',
            'image' => '',
            'level' => 'inner',
            'container' => false
        );
    }

    public function content() {
        $img = new Media($this->getField('image'));
        return App::instance()->render(DOC_ROOT.'modules/forge-news/templates/', "disturber", array(
            'image' => is_object($img) ? $img->getUrl() : false,
            'title' => $this->getField('title'),
            'subtitle' => $this->getField('subtitle'),
            'cta_title' => $this->getField('cta_title'),
            'cta_link' => $this->getField('cta_link'),
            'cta_target' => $this->getField('cta_target'),
        ));
    }
}

?>
