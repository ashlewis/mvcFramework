<?php
class ItemTest extends PHPUnit_Framework_TestCase{
    
    private $item;
    
    public function setUp(){
        $this->item = new Item();
    }
    
    public function tearDown() {
        unset($this->item);
    }
    
    /**
     * 
     * Test constructed item is empty
     */
    public function testConstructEmpty(){
        $expected = array(null, null, null);
        $actual = array($this->item->getId(), $this->item->getName(), $this->item->getDescription());
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * 
     * Test item setters and getters
     */
    public function testSetItem(){
        $expected = array(1, 'abc', 'abcde');
        
        $this->item->setId($expected[0]);
        $this->item->setName($expected[1]);
        $this->item->setDescription($expected[2]);
        $actual = array($this->item->getId(), $this->item->getName(), $this->item->getDescription());
        
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * 
     * Test title null value error
     */
    public function testTitleNullError(){        
        $this->assertInstanceOf('Error', $this->item->setName(''));
    }
    
    /**
     * 
     * Test title length error
     */
    public function testTitleLengthError(){        
        $this->assertInstanceOf('Error', $this->item->setName('ab'));
    }
    
    /**
     * 
     * Test description null value error
     */
    public function testDescriptionNullError(){        
        $this->assertInstanceOf('Error', $this->item->setDescription(''));
    }
    
    /**
     * 
     * Test description length error  
     */
    public function testDescriptionLengthError(){        
        $this->assertInstanceOf('Error', $this->item->setDescription('abcd'));
    }
    
    /**
     * 
     * Test name string filter
     */
    public function testNameFilter(){
        $this->item->setName('<p>abc</p>');
        
        $this->assertEquals($this->item->getName(), 'abc');
    }
    
    /**
     * 
     * Test name filter length error  
     */
    public function testNameFilterLengthError(){        
        $this->assertInstanceOf('Error', $this->item->setName('<p>ab</p>'));
    }
    
    /**
     * 
     * Test description string filter
     */
    public function testDescriptionFilter(){
        $this->item->setDescription('<p>abcde</p>');
        
        $this->assertEquals($this->item->getDescription(), 'abcde');
    }
    
    /**
     * 
     * Test description filter length error  
     */
    public function testDescriptionFilterLengthError(){        
        $this->assertInstanceOf('Error', $this->item->setDescription('<p>abcd</p>'));
    }
  
}

    