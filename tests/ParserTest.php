<?php

namespace tests;

use HtmlParser\Parser;

class ParserTest extends \PHPUnit_Framework_TestCase
{
	static $selectors;

	public static function setUpBeforeClass()
	{
		self::$selectors = '
		<html>
		<head></head>
		<body>
		<!--
		    <div>*</div>
		    <div>body</div>
		-->
		    <div>div</div>
		    <div class="main1">.main1</div>
		    <div class="main2">div.main2</div>
		    <div class="main3"><h1></h1><h2>.main3 h2</h2></div>
		    <div><p><span>div p span</span></p></div>
		    <div><h3>div>h3</h3></div>
		    <h1></h1><div>h1+div</div>
		    <div id="id1">#id1</div>
		    <div id="id2">div#id2</div>
		    <div class="text">.text:text</div>
		    <div>div:contains(something)</div>
		    <div class="attr">div[class=attr]</div>
		    <div><a href="#">a[href="#"]</a></div>
		    <div><a title="first episode">a[title~=episode]</a></div>
		    <div><a alt="first episode">a[alt]</a></div>
		<!--
		    <div><p>p:first</p><p>p:second</p></div>
		    <div>p:has(strong)</div>
		    <div>:checked</div>
		    <div>:disabled</div>
		-->
		</body>
		</html>';
	}

    public function testSelectors()
    {
        $harness = Parser::from_string(self::$selectors);
        $parser = Parser::from_string(self::$selectors);

        foreach ($harness->find('body div') as $n) {
            $selector = trim($n->text);
            echo $selector."\n";
            $n = $parser->find($selector, 0);

            $this->assertNotNull($n);
            $this->assertEquals($selector, $n->text);
        }
    }
}
