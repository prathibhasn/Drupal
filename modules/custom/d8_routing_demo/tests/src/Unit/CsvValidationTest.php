<?php
namespace Drupal\d8_routing_demo\Tests\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\file\FileInterface;

class CsvValidationTest extends UnitTestCase {

    public function setUp(){
      require_once __DIR__.'/../../../d8_routing_demo.module';
    }
    //error condition
    public function test_CsvFileIsMyName() {
        $file = $this->getMock(FileInterface::class);
        $file->method('getFileName')
        ->willReturn('prathibhas.csv');
        $this->assertContains(
            'Only files named prathibha.csv will be accepted',
            d8_routing_demo_validate_csv($file)
        );
    }
    //pass condition
    public function test_CsvFileIsNotMyName() {
        $file = $this->getMock(FileInterface::class);
        $file->method('getFileName')
        ->willReturn('prathibha.csv');
        $this->assertNotContains(
            'Only files named prathibha.csv will be accepted',
            d8_routing_demo_validate_csv($file)
        );
    }

}