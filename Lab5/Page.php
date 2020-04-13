<?php
  class Page {
    private $page;
    private $title;
    private $year;
    private $copyright;
    private $content;

    function __construct($title, $year, $copyright, $content) {
      $this->page = '';
      $this->title = $title;
      $this->year = $year;
      $this->copyright = $copyright;
      $this->content = $content;
    }

    public function addHeader() {
      $this->page .= "<html><h1>$this->title</h1>";
    }

    public function addFooter() {
      $this->page .= "<footer><p>&copy;$this->copyright - $this->year<p></footer></html>";
    }

    public function addContent() {
      $this->page .="<body>$this->content</body>";
    }

    public function get() {
      return $this->page;
    }
  }
?>