<h2 class='text-info'>Sách mới</h2>
<?php
  
  if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $info = $_POST['info'];
    $author = $_POST['author'];
    $cat = $_POST['subItem_id'];
    $price = $_POST['price'];
    $page = $_POST['page'];
    $time = date('Y-m-d', time());
	$soluong=$_POST['soluong'];
    if(isset($_POST['stataus'])) {$status = $_POST['status'];}
    else { $status = 1;}
    
    if(isset($_FILES['thumb'])){
      copy($_FILES['thumb']['tmp_name'], '../post/image/'.$_FILES['thumb']['name']);
       $thumb = "".HOME."/post/image/".$_FILES['thumb']['name'];
    }
    $sql = "
      INSERT INTO post(name, thumb, author, category, price, pages, info, times, status,soluong) 
      VALUES ('$name', '$thumb', '$author', '$cat', '$price', '$page', '$info', '$time', '$status','$soluong')
    ";
    $isDone=mysql_query($sql);
	if($isDone==1){
		?>
        <script>
		alert("Đã thêm thành công !");
		window.location="<?php echo "".ADMIN."/post.php"?>";
		</script>
		<?php
		
		}
		else
		{
			?>
             <script>
		alert("Đã có lỗi xảy ra, vui lòng kiểm tra lại !");
		
		</script>
            <?php
			
			}
    //header("Location: ".ADMIN."/post.php");  
    
    //echo $sql;
    
  }
?>            
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
    <p>Tên sách:</p>
      <label for="name"></label>
      <input type="text" name="name" id="name" size='70' placeholder="Tên sách"  required="required"/>
    </p>
      <p>Phần giới thiệu:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10" ></textarea>
      </p>
      <p>Ảnh bìa:</p>
      <p>
        <label for="thumb"></label>
        <input type="file" name="thumb"/>
      </p>
      <p>
        <input type="submit" name="insert" id="insert" value="Lưu" class='btn btn-info' />
      </p></td>
    <td width="295" valign="top"><p>Tác giả:</p>
      <p>
        <label for="author"></label>
        <input type="text" name="author" id="author" placeholder="Nhập tên tác giả" />
      </p>
      <p>Danh mục:</p>
      <p>
        <label for="cat"></label>
        <select name="subItem_id" id="subItem_id">
          <?php
            $cur = mysql_query("select * from submenu");
            while($row = mysql_fetch_array($cur)){
              echo "<option value='".$row[0]."'>".$row[2]."</option>";
            }

          ?>
        </select>
      </p>
      <p>Đơn giá:</p>
      <p>
        <label for="price"></label>
        <input type="number" name="price" id="price" placeholder="Nhập giá sản phẩm" required="required" />
      </p>
      <p>Số trang:</p>
      <p>
        <label for="page"></label>
        <input type="number" name="page" id="page" placeholder="Nhập số trang"/ required="required">
      </p>
      <p>Số lượng:</p>
      <p>
        <label for="page"></label>
        <input type="number" name="soluong" id="soluong" placeholder="Nhập số lượng sách"/ required="required">
      </p>
      <p id='status'>Trạng thái: 
        <input type="radio" name="status" id="radio" value="1" checked="checked" />        
      Hiển thị 
      <input type="radio" name="status" id="radio2" value="0" />
     
      Lưu</p></td>
  </tr>
</table>
</form>
          
<?php mysql_close(); ?>