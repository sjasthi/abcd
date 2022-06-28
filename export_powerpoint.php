<?php
require_once 'src/PhpPowerpoint/Autoloader.php';
\PhpOffice\PhpPowerpoint\Autoloader::register();

use PhpOffice\PhpPowerpoint\PhpPowerpoint;
use PhpOffice\PhpPowerpoint\IOFactory;
use PhpOffice\PhpPowerpoint\Style\Color;
use PhpOffice\PhpPowerpoint\Style\Alignment;

$presentation = new PhpPresentation();

// Create slide
$currentSlide = $presentation->getActiveSlide();

// Create a shape (drawing)
$shape = $currentSlide->createDrawingShape();
$shape->setName('PHPPresentation logo')
        ->setDescription('PHPPresentation logo')
        ->setPath('./resources/phppresentation_logo.gif')
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
$shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$textRun = $shape->createTextRun('Thank you for using PHPPresentation!');
$textRun->getFont()->setBold(true)
                    ->setSize(60)
                    ->setColor(new Color('FFE06B20'));

$writerPPTX = IOFactory::createWriter($presentation, 'PowerPoint2007');
$writerPPTX->save(__DIR__ . '/sample.pptx');
$writerODP = IOFactory::createWriter($presentation, 'ODPresentation');
$writerODP->save(__DIR__ . '/sample.odp');
?>