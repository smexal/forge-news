<?

class ForgeNews extends Module {

  public function setup() {
        $this->settings = Settings::instance();
        $this->id = "forge-news";
        $this->name = i('News for Forge', 'forge-news');
        $this->description = i('Module to add a News Collection and Components.', 'forge-news');
        //$this->image = $this->url().'assets/images/...';
  }

    public function start() {
        require_once($this->directory()."collection.php");
    }
}

?>