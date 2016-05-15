  <?php
  include 'header.php';
  ?>
   <div class='nav'>
      <div id="" class="drop">
        <ul class="drop_menu">
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home icon-white'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row = mysql_fetch_array($cur)){
            echo "
            <li><a href='".$row['item_url']."'>".$row['item_name']."</a>
            ";
            $supper_id=$row[0];
            $sub=mysql_query("select * from submenu where item_id=".$supper_id);
            if(mysql_num_rows($sub)>0){
              echo "<ul>";
              while($row=mysql_fetch_array($sub)){
                echo "
                <li><a href='{$row[3]}'>{$row[2]}</a></li>
                ";  
              }
              echo "</ul>";
            }
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  <div class='index'>
    <a href="<?php echo HOME?>">Home</a> > Liên hệ
    <br>
    <h3>Liên hệ với chúng tôi :</h3>
    <div>
      <div id="wrap">
        <div class="box1">
          <form class="form" action="" method="post" name="frmContact" onsubmit="return validateForm()">
            <p class="name">
              <label for="name"><b>Họ & tên</b></label>
              <input type="text" name="name" id="name" placeholder="John Smith" />
            </p>
            <p class="email">
              <label for="email"><b>E-mail:</b></label>
              <input type="text" name="email" id="email" placeholder="example@domain.com" />
              
            </p>
            <p class="web">
              <label for="web"><b>Website:</b></label>
              <input type="text" name="web" id="web" placeholder="<?php echo HOME?>"/>
              
            </p>
            <p class="text">
             <label for="web"><b>Nội dung:</b></label>
              <textarea name="text" placeholder="Your message here" id="text"></textarea>
            </p>
            <p class="submit">
              <input type="submit" value="Submit" class='btn btn-info' name="contact">
               <input type="reset" value="Reset" class='btn btn-primary'>
            </p>
          </form>
    <?php
    if(isset($_POST['contact'])){
      $name = $_POST['name'];      
      $email = $_POST['email'];      
      $web = $_POST['web'];      
      $text = $_POST['text'];      
      $sql = "
        INSERT INTO contact(name, email, web, text) 
        VALUES ('$name', '$email','$web','$text')
      ";
      mysql_query($sql);
      header("Location: ".HOME."");  
      
    }
    ?>
        </div>
      </div> <!--wrap-->
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
  <script type="text/javascript">
function validateForm() {
    var name = document.forms["frmContact"]["name"].value;
    var email = document.forms["frmContact"]["email"].value;
    var web = document.forms["frmContact"]["web"].value;
    var text = document.forms["frmContact"]["text"].value;
    if (name == null || name == "") {
        alert("First name must be filled out");
        document.forms["frmContact"]["name"].focus();
        return false;
    }

    if (email == null || email == "") {
        alert("Email must be filled out");
        document.forms["frmContact"]["email"].focus();
        return false;
    }

    var mail = /\S+@\S+\.\S+/.test(email);
    if (!mail) {
        alert("Not a valid email address");
        document.forms["frmContact"]["email"].focus();
        return false;
    }

    if (web == null || web == "") {
        alert("Website must be filled out");
        document.forms["frmContact"]["web"].focus();
        return false;
    }
    var valid = /^(ftp|http|https):\/\/[^ "]+$/.test(web);
    if (!valid) {
        alert("Not a valid website address");
        document.forms["frmContact"]["web"].focus();
        return false;
    }

    if (text == null || text == "") {
        alert("Text must be filled out");
        document.forms["frmContact"]["text"].focus();
        return false;
    }
    return true;
}
  </script>