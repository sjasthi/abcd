<!DOCTYPE html>
<html>
    <style>
    h1 {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
    }
    </style>
    <?php
    include('header.php'); 
    ?>
    <h1>PowerPoint Downloaded...</h1>
    <form form style="text-align: center;">
        <input type="button" value="Go back!" onclick="history.back()">
    </form>
</html>

<?php

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Slide;
use PhpOffice\PhpPresentation\Slide\Iterator;

require_once 'vendor/autoload.php';


$objPHPPowerPoint = new PhpPresentation();

// Create slide
$currentSlide = $objPHPPowerPoint->getActiveSlide();

// Create a shape (drawing)
$shape = $currentSlide->createDrawingShape();
$shape->setName('PHPPowerPoint logo')
->setDescription('PHPPowerPoint logo')
->setPath('images\about_images\abcd_logo.png')
->setHeight(72)
->setOffsetX(20)
->setOffsetY(20);
$shape->getShadow()->setVisible(true)
->setDirection(90)
->setDistance(20);

// Create a shape (text)
$shape = $currentSlide->createRichTextShape()
->setHeight(300)
->setWidth(600)
->setOffsetX(170)
->setOffsetY(180);
$shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
$textRun = $shape->createTextRun('Thank You For Using ABCD Project!');
$textRun->getFont()->setBold(true)
->setSize(60)
->setColor( new Color( 'FFE06B20' ) );

// $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
// $oWriterPPTX->save(getenv("HOMEDRIVE").getenv("HOMEPATH")."\Downloads" . "\sample.pptx");



$mysqli = mysqli_connect('localhost', 'root', '', 'abcd_db');
$TableName = "dresses";

$strSQL = "SELECT * FROM $TableName";
$sql = mysqli_query($mysqli, $strSQL);

if (mysqli_error($mysqli)) {
    echo mysqli_error($mysqli);
} else {
    if($sql->num_rows > 0) {
        $delimiter = ",";
        $filename = "dress-data_" . date('Y-m-d') . ".csv";
        
        $f = fopen('php://memory', 'w');
        $fields = array('id', 'name', 'description', 'did_you_know', 'category', 'type', 'state_name', 'key_words', 'image_url', 'status', 'notes');

        /**
         * while($row = $sql->fetch_assoc())
         */
         $count = 0;
         while($count != 5) {
            $lineData = array($row['id'],$row['name'],$row['description'],$row['did_you_know'],$row['category'],$row['type'],$row['state_name'],$row['key_words'],$row['image_url'],$row['status'],$row['notes']);
            
            
            $slide = $objPHPPowerPoint->getActiveSlide();
            
            $shape = $slide->createDrawingShape();
            $shape->setName($row['name'])
            ->setDescription($row['description'])
            ->setPath('images\dress_images\adul_kalam_dress.jpg')
            ->setHeight(72)
            ->setOffsetX(20)
            ->setOffsetY(20);
            $shape->getShadow()->setVisible(true)
            ->setDirection(90)
            ->setDistance(20);
            
            $count++;
            $objPHPPowerPoint->addSlide($slide);
        }
        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $oWriterPPTX->save(getenv("HOMEDRIVE").getenv("HOMEPATH")."\Downloads" . "\sample.pptx");
    }
}




?>






