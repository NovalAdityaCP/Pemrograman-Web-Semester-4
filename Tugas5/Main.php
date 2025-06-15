<?php

require_once 'Class.php';

$cdMusic = new CDMusic("Greatest Hits", 150000, 7000, "Legend Band", "Pop Rock");

$cdCabinet = new CDCabinet("Premium Rack", 300000, 15000, 100, "Minimalist");

echo "    CD Music    <br>";
echo "Name: " . $cdMusic->getName() . "<br>";
echo "Artist: " . $cdMusic->getArtist() . "<br>";
echo "Genre: " . $cdMusic->getGenre() . "<br>";
echo "Price: Rp " . $cdMusic->getPrice() . "<br>";
echo "Discount: Rp " . $cdMusic->getDiscount() . "<br><br>";

echo "    CD Cabinet    <br>";
echo "Name: " . $cdCabinet->getName() . "<br>";
echo "Model: " . $cdCabinet->getModel() . "<br>";
echo "Capacity: " . $cdCabinet->getCapacity() . " CD<br>";
echo "Price: Rp " . $cdCabinet->getPrice() . "<br>";
echo "Discount: Rp " . $cdCabinet->getDiscount() . "<br>";