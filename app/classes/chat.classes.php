<?php

class Chat extends Dbh
{
    public function InsertChat()
    {
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = htmlspecialchars($_POST['incoming_id'], ENT_QUOTES, "UTF-8");
        $message = htmlspecialchars($_POST['incoming_id'], ENT_QUOTES, "UTF-8");

        if(!empty($message)){
            $stmt = $this->connect()->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}');");

            if (!$stmt->execute()) 
            {
                $stmt = null;
                dd('InsertChat nao executou');
                // header("Location: /?error=stmtfailed");
                // exit();
            }

            if ($stmt->rowCount() == 0) 
            {
                dd('No messages');
            }
        }

        $stmt = null;

    }

    public function GetChat()
    {
        if(isset($_SESSION['unique_id'])){
            $outgoing_id = $_SESSION['unique_id'];
            $incoming_id = htmlspecialchars($_POST['incoming_id'], ENT_QUOTES, "UTF-8");
            $output = "";

            $stmt = $this->connect()->prepare("SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                    WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id;");
    
    

            if (!$stmt->execute()) 
            {
                $stmt = null;
                dd('GetChat nao executou');
                // header("Location: /?error=stmtfailed");
                // exit();
            }

            if($stmt->rowCount() > 0)
            {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if($row['outgoing_msg_id'] === $outgoing_id){
                        $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }else{
                        $output .= '<div class="chat incoming">
                                    <img src="public/assets/images/'.$row['user_img'].'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                    </div>';
                    }
                }
    
    
            }else
            {
                $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
            }
            echo $output;
        }else{
            header("location: /");
        }
    
    }

    public function UserChat()
    {
        $outgoing_id = $_SESSION['unique_id'];

        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC;");

        if (!$stmt->execute()) 
        {
            $stmt = null;
            dd('UserChat nao executou');
            // header("Location: /?error=stmtfailed");
            // exit();
        }
        $output = "";

        if($stmt->rowCount() == 0){
            $output .= "No users are available to chat";
        }
        elseif($stmt->rowCount() > 0)
        {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $stmt2 = $this->connect()->prepare("SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1;");

                if (!$stmt2->execute()) 
                {
                    $stmt = null;
                    dd('UserChat nao executou');
                    // header("Location: /?error=stmtfailed");
                    // exit();
                }
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

                ($stmt->rowCount() > 0) ? $result = $row2['msg'] : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

                if(isset($row2['outgoing_msg_id']))
                {
                    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }else
                {
                    $you = "";
                }

                ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="/chat?user_id='. $row['unique_id'] .'">
                            <div class="content">
                            <img src="public/assets/images/'. $row['user_img'] .'" alt="">
                            <div class="details">
                                <span>'. $row['user_first_name']. " " . $row['user_last_name'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
        }
        echo $output;
    }
}