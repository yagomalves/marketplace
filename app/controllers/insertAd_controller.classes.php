<?php


class InsertAdController extends InsertAd
{
    private $title;
    private $type;
    private $description;
    private $adDate;
   // private $image;
    private $user_id;

    public function __construct($title, $type, $description, $user_id, $adDate)
    {
        $this->title = $title;
        $this->type = $type;
        $this->description = $description;
        $this->adDate = $adDate;
    //    $this->image = $image;
        $this->user_id = $user_id;
    }

    public function SubmitAd()
    {
        if($this->emptyInput() == false) {
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

    $this->setAd($this->title, $this->type, $this->description, $this->user_id, $this->adDate);

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