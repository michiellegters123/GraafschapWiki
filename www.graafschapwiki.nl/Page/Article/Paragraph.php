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
}

class Paragraph
{
    private $subParagraphs = array();

    public function addSub(SubParagraph $sub)
    {
        array_push($this->subParagraphs, $sub);
    }
}