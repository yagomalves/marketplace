<?php


class InsertAdController extends InsertAd
{
    private $title;
    private $type;
    private $description;
    private $adDate;
   // private $image;
    private $user_id;
    private $price;
    private $cep;
    private $state;
    private $city;
    private $district;

    public function __construct($title, $type, $description, $user_id, $adDate, $price, $cep, $state, $city, $district)
    {
        $this->title = $title;
        $this->type = $type;
        $this->description = $description;
        $this->adDate = $adDate;
    //    $this->image = $image;
        $this->user_id = $user_id;
        $this->price = $price;
        $this->cep = $cep;
        $this->state = $state;
        $this->city = $city;
        $this->district = $district;
    }

    public function SubmitAd()
    {
        if($this->emptyInput() == false) {
            header("Location: /?error=emptyinput");
            exit();
        }

    $this->setAd($this->title, $this->type, $this->description, $this->user_id, $this->adDate, $this->price, $this->cep, $this->state, $this->city, $this->district);

    }

    private function emptyInput()
    {
        if(empty($this->title) || empty($this->type) || empty($this->description))
        {
            $result = false;
        } else {
            $result = true;
        }
    return $result;
    } 

}