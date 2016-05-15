
<?php include 'header.php'; ?>
<?php
$page_name = $_GET['page_name'];

$row = mysql_fetch_array(mysql_query("select * from page where page_name = '$page_name' ")); 

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
<div class='index_view'>
	 <a href="<?php echo HOME;?>">Home</a> > <?php echo ucwords($row['page_name']); ?>
	<br>
	<p id='detail'><?php echo ucwords($row['page_name']); ?></p>

	<div id='post_view'>
		
		

		<table width="100%" height="100%" border="0">
			<tr>
			<td>
				<?php echo $row['page_content']; ?>
                <br/>
				
			</td>
		</tr>
	</table>

	

	
</div>
</div>	
<br/>
<?php include 'footer.php'; ?>