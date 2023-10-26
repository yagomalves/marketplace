<?php
namespace app\controllers;

use ChatInfoView;

class ChatController
{
    public function fetch()
    {
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/accountinfo.classes.php";
        include "../app/views/chat_view.classes.php";

        $userInfo = new ChatInfoView;
?>        
        <div class="wrapper">
        <section class="users">
        <header>
            <div class="content">
            <?php 
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <img src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
                <p><?php echo $row['status']; ?></p>
            </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
    
        </div>
        </section>
    </div> 

<?php
    }
    
    public function show()
    { 
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/accountinfo.classes.php";
        include "../app/views/chat_view.classes.php";

        $chatInfo = new ChatInfoView;
        
?>
        <div class="wrapper">
    <section class="chat-area">
      <header>

        <img src="public/assets/images/<?=$chatInfo->FetchImage($_SESSION['userid'])?>" alt="">
        <div class="details">
          <span><?= $_SESSION['user_first_name']. " " . $_SESSION['user_last_name'] ?></span>
          <p><?= $chatInfo->FetchStatus($_SESSION['userid']) ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?=$_SESSION['userid']; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
        
    <script>

        const form = document.querySelector(".typing-area"),
        incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".input-field"),
        sendBtn = form.querySelector("button"),
        chatBox = document.querySelector(".chat-box");

        form.onsubmit = (e)=>{
            e.preventDefault();
        }

        inputField.focus();
        inputField.onkeyup = ()=>{
            if(inputField.value != ""){
                sendBtn.classList.add("active");
            }else{
                sendBtn.classList.remove("active");
            }
        }

        sendBtn.onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert-chat.php", true);
            xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    inputField.value = "";
                    scrollToBottom();
                }
            }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }
        chatBox.onmouseenter = ()=>{
            chatBox.classList.add("active");
        }

        chatBox.onmouseleave = ()=>{
            chatBox.classList.remove("active");
        }

        setInterval(() =>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/get-chat.php", true);
            xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if(!chatBox.classList.contains("active")){
                        scrollToBottom();
                    }
                }
            }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("incoming_id="+incoming_id);
        }, 500);

        function scrollToBottom(){
            chatBox.scrollTop = chatBox.scrollHeight;
        }
  

    </script>
<?php
    }
}