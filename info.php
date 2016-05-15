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
    <a href="<?php echo HOME?>">Home</a> > Giới thiệu
    <br/>
    <h3>Thành Viên Nhóm III:</h3>
   
      <p><a href="https://www.facebook.com/duc.anh.545">LÊ ĐỨC ANH - 25/09/1993 </a></p>
      <p><a href="http://doanvublog.wordpress.com/">VŨ VĂN ĐOÀN - 24/11/1992</a></p>
      <p><a href="https://www.facebook.com/huuduc.a7">ĐÀO HỮU ĐỨC- 03/06/1993</a></p>
    
    
     
  </div>
  <?php
  include 'footer.php';
  ?>
  