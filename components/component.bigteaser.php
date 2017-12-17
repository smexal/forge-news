<?php

namespace Forge\Modules\ForgeNews;

use \Forge\Core\Classes\Media;
use \Forge\Core\Abstracts\Component;
use \Forge\Core\App\App;
use \Forge\Core\Classes\Utils;



class BigteaserComponent extends Component {
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
                "label" => i('Text', 'forge-news'),
                "hint" => '',
                "key" => "text",
                "type" => "wysiwyg"
            ),
            array(
                "label" => i('Image', 'forge-news'),
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
            ),
            array(
                "label" => i('Secondary Action Title', 'forge-news'),
                "hint" => '',
                "key" => "secondary_cta_title",
                "type" => "text"
            ),
            array(
                "label" => i('Secondary Action Link', 'forge-news'),
                "hint" => '',
                "key" => "secondary_cta_link",
                "type" => "url"
            ),
            array(
                "label" => i('Secondary Action Target', 'forge-news'),
                "hint" => '',
                "key" => "secondary_cta_target",
                "type" => "select",
                "values" => [
                    '_self' => i('Same Windows', 'forge-news'),
                    '_blank' => i('New Window', 'forge-news')
                ]
            )
        );
        return array(
            'name' => i('Big Teaser Element', 'forge-news'),
            'description' => i('News Style Big Teaser Element', 'forge-news'),
            'id' => 'forge-news-bigteaser',
            'image' => '',
            'level' => 'inner',
            'container' => false
        );
    }

    public function content() {
        $img = new Media($this->getField('image'));
        return App::instance()->render(DOC_ROOT.'modules/forge-news/templates/', "bigteaser", array(
            'title' => $this->getField('title'),
            'text' => $this->getField('text'),
            'img' => $img->getUrl(),
            'cta' => [
                'url' => $this->getField('cta_link'),
                'title' => $this->getField('cta_title'),
                'target' => $this->getField('cta_target'),
            ],
            'sec_cta' => [
                'url' => $this->getField('secondary_cta_link'),
                'title' => $this->getField('secondary_cta_title'),
                'target' => $this->getField('secondary_cta_target'),
            ]
        ));
    }
}

?>
