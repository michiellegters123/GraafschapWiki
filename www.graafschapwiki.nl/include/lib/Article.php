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

    public function generateQuerry()
    {
        $sql = "INSERT INTO subparagraph(subparagraph.title, subparagraph.content, subparagraph.paragraph) VALUES('$this->title', '$this->text',(SELECT paragraphid FROM paragraph ORDER BY paragraphid DESC LIMIT 1 ));";

        return $sql;
    }

    public function write()
    {
        echo "<p class='ContentText SubParagraphTitle'>$this->title</p>";
        echo "<p class='ContentText'>$this->text</p>";
    }

    public function writeForm($number, $pNum)
    {
        echo "<input type='text' name='S_T_" . $pNum . "_" . $number . "' form='ArticleForm' class='ContentText SubParagraphTitle' value='" . $this->title . "'><br>";
        echo "<textarea form='ArticleForm' name='S_C_" . $pNum . "_" . $number . "' class='ContentText EditArea'>$this->text</textarea><br>";
        return $number + 1;
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

    public function generateQuerry()
    {
        $sql = "INSERT INTO paragraph(paragraph.title, paragraph.article) VALUES('$this->title', (SELECT articleid FROM article ORDER BY articleid DESC LIMIT 1));";

        foreach ($this->subParagraphs as $item)
        {
            $sql .= $item->generateQuerry();
        }

        return $sql;
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
        echo "<input type='text' name='P_T_" . $number . "' form='ArticleForm' class='ParagraphTitle' value='" . $this->title . "'><br>";
        $number++;

        $localNumber = 0;
        foreach ($this->subParagraphs as $item)
        {
            $localNumber += $item->writeForm($localNumber, $number);
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

    function generateQuerry($verified, $target)
    {
        $verified = $verified ? 1 : 0;
        $sql = "INSERT INTO article(title, intro, verified, target)
                    VALUES('$this->title', '$this->intro', $verified, $target);
                    ";

        foreach ($this->paragraphs as $item)
        {
            $sql .= $item->generateQuerry();
        }

        return $sql;
    }

    function write()
    {
        echo "<h1 class='ArticleTitle'>$this->title</h1>";
        echo "<p class='Intro ContentText'>$this->intro</p>";
        foreach ($this->paragraphs as $item)
        {
            $item->write();
        }
    }

    function writeForm($id)
    {

        echo "<input type='text' name='title' form='ArticleForm' class='Title' value='" . $this->title . "'><br>";
        echo "<textarea form='ArticleForm' name='intro' class='Intro ContentText EditArea'>$this->intro</textarea><br>";
        echo "<br>";
        $number = 0;
        foreach ($this->paragraphs as $item)
        {
            $number += $item->writeForm($number);
        }

        echo "
        <form id='ArticleForm'  action='articleSubmit.php' method='post'>
            <input type='hidden' name='id' value='" . $id . "'>
            <input type='submit' value='Submit Change'>
        </form>
        ";
    }


}