<?php

class Product {
    protected $name;
    protected $price;
    protected $discount;

    public function __construct($name, $price, $discount){
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }
    
    public function getName (){
        return $this->name;
    }

    public function setName ($name){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getDiscount (){
        return $this->discount;
    }

    public function setDiscount ($discount){
        $this->discount = $discount;
    }
}

class CDMusic extends Product {
    private $artist;
    private $genre;

    public function __construct($name, $price, $discount, $artist, $genre){
        $price += $price * 0.10;
        $discount += $discount * 0.05;

        parent::__construct($name, $price, $discount);
        $this->artist = $artist;
        $this->genre = $genre;
    }

    public function getArtist (){
        return $this->artist;
    }

    public function setArtist ($artist){
        $this->artist = $artist;
    }

    public function getGenre (){
        return $this->genre;
    }

    public function setGenre ($genre){
        $this->genre = $genre;
    }

    
}

class CDCabinet extends Product {
    private $capacity;
    private $model;

    public function __construct($name, $price, $discount, $capacity, $model){
        $price += $price * 0.15;

        parent::__construct($name, $price, $discount);
        $this->capacity = $capacity;
        $this->model = $model;
    }

    public function getCapacity (){
        return $this->capacity;
    }

    public function setCapacity ($capacity){
        $this->capacity = $capacity;
    }

    public function getModel (){
        return $this->model;
    }

    public function setModel ($model){
        $this->model = $model;
    }

    
}