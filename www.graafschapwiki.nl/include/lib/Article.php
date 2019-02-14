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

    public function writeForm($number)
    {
        echo "<input type='text' class='ContentText SubParagraphTitle' value='". $this->title ."'><br>";
        echo "<textarea class='ContentText'>$this->text</textarea><br>";
        return $number + 2;
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

    public function writeForm($number)
    {
        echo "<input type='text' class='ParagraphTitle' value='". $this->title ."'><br>";
        $number++;
        foreach ($this->subParagraphs as $item)
        {
            $number += $item->writeForm($number);
        }
        echo "<br>";


        return $number;
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

    public function getTitle()
    {
        return $this->title;
    }

    function write()
    {
        echo "<h1 class='ArticleTitle'>$this->title</h1>";
        echo "<p class='Intro'>$this->intro</p>";
        foreach ($this->paragraphs as $item)
        {
            $item->write();
        }
    }

    function writeForm()
    {

        echo "<input type='text' class='ArticleTitle' value='". $this->title ."'><br>";
        echo "<textarea class='Intro'>$this->intro</textarea><br>";
        echo "<br>";
        $number = 2;
        foreach ($this->paragraphs as $item)
        {
            $number += $item->writeForm($number);
        }

        echo "
        <form id='ArticleForm'>
            <input type='submit' value='Submit Change'>
        </form>
        ";
    }


}