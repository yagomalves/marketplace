<?php

class ChatInfoView extends AccountInfo
{
    public function FetchImage($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["user_img"];
    }

    public function FetchStatus($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["status"];
    }


}