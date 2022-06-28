<?php

use PhpOffice\PhpPowerpoint\PhpPowerpoint;
use PhpOffice\PhpPowerpoint\IOFactory;
use PhpOffice\PhpPowerpoint\Style\Alignment;
use PhpOffice\PhpPowerpoint\Style\Color;
use PhpOffice\PhpPowerpoint\Shape\MemoryDrawing;
use PhpOffice\PhpPowerpoint\Style\Fill;

require_once 'F:\XAMPP\htdocs\abcd\vendor\autoload.php';

$objPHPPowerPoint = new PhpPowerpoint();

// Create slide
$currentSlide = $objPHPPowerPoint->getActiveSlide();

// Create a shape (drawing)
$shape = $currentSlide->createDrawingShape();
$shape->setName('PHPPowerPoint logo')
->setDescription('PHPPowerPoint logo')
->setPath('./resources/phppowerpoint_logo.gif')
->setHeight(36)
->setOffsetX(10)
->setOffsetY(10);
$shape->getShadow()->setVisible(true)
->setDirection(45)
->setDistance(10);

// Create a shape (text)
$shape = $currentSlide->createRichTextShape()
->setHeight(300)
->setWidth(600)
->setOffsetX(170)
->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
$textRun = $shape->createTextRun('Thank you for using PHPPowerPoint!');
$textRun->getFont()->setBold(true)
->setSize(60)
->setColor( new Color( 'FFE06B20' ) );

$oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
$oWriterPPTX->save(DIR . "/sample.pptx");
$oWriterODP = IOFactory::createWriter($objPHPPowerPoint, 'ODPresentation');
$oWriterODP->save(DIR . "/sample.odp");
?>