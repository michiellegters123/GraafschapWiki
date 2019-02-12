<?php

class SubParagraph
{
    private $title;
    private $text;

    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function write()
    {
        echo "<p class='ContentText SubParagraphTitle'>$this->title</p>";
        echo "<p class='ContentText'>$this->text</p>";
    }
}

class Paragraph
{
    private $subParagraphs = array();
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function addSub(SubParagraph $sub)
    {
        array_push($this->subParagraphs, $sub);
    }

    public function write()
    {
        echo "<h2 class='ParagraphTitle'>$this->title</h2>";
        foreach ($this->subParagraphs as $item)
        {
            $item->write();
        }
    }
}

class Article
{
    private $title;
    private $intro;
    private $paragraphs = array();


    function __construct($title, $intro = "")
    {
        $this->title = $title;
        $this->intro = $intro;
    }

    function addParagraph($p)
    {
        array_push($this->paragraphs, $p);
    }

    function write()
    {
        echo "<h1>$this->title</h1>";
        echo "<p>$this->intro</p>";
        foreach ($this->paragraphs as $item)
        {
            $item->write();
        }
    }



}