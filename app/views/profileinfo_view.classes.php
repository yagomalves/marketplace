<?php

class ProfileInfoView extends ProfileInfo
{
    public function FetchAbout($userId)
    {
        $profileInfo = $this->GetProfileInfo($userId);
        echo $profileInfo[0]["profiles_about"];
    }

    public function FetchTitle($userId)
    {
        $profileInfo = $this->GetProfileInfo($userId);
        echo $profileInfo[0]["profiles_introtitle"];
    }

    public function FetchText($userId)
    {
        $profileInfo = $this->GetProfileInfo($userId);
        echo $profileInfo[0]["profiles_introtext"];
    } 
}