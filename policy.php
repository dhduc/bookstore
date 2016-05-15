<?php include 'header.php'; ?>
<div class='nav'>
      <div id="" class="drop">
        <ul class="drop_menu">
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home icon-white'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row1 = mysql_fetch_array($cur)){
            echo "
            <li><a href='".$row1['item_url']."'>".$row1['item_name']."</a>
            ";
            $supper_id=$row1[0];
            $sub=mysql_query("select * from submenu where item_id=".$supper_id);
            if(mysql_num_rows($sub)>0){
              echo "<ul>";
              while($row1=mysql_fetch_array($sub)){
                echo "
                <li><a href='{$row1[3]}'>{$row1[2]}</a></li>
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
<p style="text-align: center">QUY CHẾ SÀN GIAO DỊCH <br>THƯƠNG MẠI ĐIỆN TỬ BUY MORE</p>
                    <p style="text-align:center; font-style:italic">(Ban hành kèm theo Quyết định số 004/2011/QĐ-NM <br>ngày 19 tháng 09 năm 2011 của Công ty TNHH BUY MORE)</p>
						<h1>I. NGUYÊN TẮC:</h1>
                            <p>Bản Quy chế này áp dụng cho các thành viên đăng ký sử dụng, tham gia các chương trình khuyến mại được tổ chức thực hiện trên Sàn giao dịch Thương mại điện tử BUY MORE.</p>  
                          <p>
                            Sàn giao dịch TMĐT BUY MORE do Công ty TNHH BUY MORE triển khai giới thiệu các chương trình khuyến mại cho các sản phẩm, dịch vụ theo ủy quyền của thương nhân khác.
                  </p>
                            
                            <p>Thành viên tham gia giao dịch trên Sàn giao dịch TMĐT BUY MORE là các cá nhân có đầy đủ năng lực hành vi dân sự và phải đăng ký kê khai ban đầu về các thông tin cá nhân bắt buộc theo yêu cầu và được Ban quản lý sàn TMĐT BUY MORE chính thức công nhận và được phép sử dụng dịch vụ do Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>Từ "dịch vụ" bao gồm tất cả các dịch vụ do Sàn giao dịch TMĐT BUY MORE cung cấp hoặc liên quan đến Sàn giao dịch TMĐT BUY MORE. Sàn giao dịch TMĐT BUY MORE là nơi giao thương giữa các thương nhân (người bán) và thành viên (người mua) đồng thời giúp quá trình mua bán qua mạng thực hiện một cách trọn vẹn bằng việc tính hợp tính năng trực tuyến.</p>
                              <p>Tất cả các nội dung trong bản Quy chế này phải tuân thủ theo hệ thống pháp luật hiện hành của Việt Nam. Thành viên khi tham gia vào Sàn giao dịch TMĐT TMĐT BUY MORE phải tự tìm hiểu trách nhiệm pháp lý của mình đối với luật pháp hiện hành của Việt Nam và cam kết thực hiện đúng những nội dung trong Quy chế của Sàn giao dịch TMĐT BUY MORE.</p> 
                                         
                            <h1>II. QUY TRÌNH GIAO DỊCH:</h1> 
                            <p>Ban quản lý Sàn giao dịch TMĐT BUY MORE giới thiệu đến các thành viên các chương trình khuyến mại của các thương nhân khác có nhu cầu khuyến mại cho các sản phẩm hàng hóa do thương nhân đó đang trực tiếp kinh doanh và đưa ra mức giá, các phương thức thanh toán, Thành viên có thể tham khảo và lựa chọn mua để sử dụng các sản phẩm, dịch vụ được khuyến mại của các thương nhân thực hiện, nếu xét thấy phù hợp với nhu cầu cá nhân.</p>  
                            
                            <p>Ban quản lý Sàn giao dịch TMĐT BUY MORE hỗ trợ dịch vụ giao hàng hóa miễn phí cho các thành viên đăng ký mua, và thu hộ tiền cho các thương nhân đã bán hàng hóa cho các thành viên.</p>
                            
                            <p>Để hổ trợ cho các thành viên khi thanh toán, Ban quản lý sàn đưa ra các phương thức thanh toán linh hoạt, Thành viên có thể tham khảo và lựa chọn áp dụng nếu phù hợp:</p> 
                            
                            <p> a. Thanh toán trước online bằng thẻ ATM nội địa thông qua hệ thống thanh toán Smartlink (VCB, TCB, VIB, EIB, MB , ACB, Vietinbank, HDBank); hoặc thẻ thanh toán quốc tế (Visa, Master card..) theo trình tự sau:</p> 
                           	
                            <p style="margin-left:25px;">- Bước 1: Khách hàng đặt hàng;</p> 
                            <p style="margin-left:25px;">- Bước 2: Khách hàng thanh toán trước;</p> 
                            <p style="margin-left:25px;">- Bước 3: Ban quản lý sàn kiểm tra và chuyển hàng;</p> 
                            <p style="margin-left:25px;">- Bước 4: Khách hàng kiểm tra và nhận hàng;</p> 
                            <p>b. Thanh toán sau (thành viên nhận hàng tại Văn phòng BUY MORE, hoặc tại nơi khách hàng yêu cầu trong phạm vi công ty hoạt động):</p> 
                            <p style="margin-left:25px;">- Bước 1: Khách hàng đặt hàng;</p> 
                            <p style="margin-left:25px;">- Bước 2: Khách hàng và Ban quản lý Sàn xác thực đơn hàng (điện thoại, tin nhắn, email);</p> 
                            <p style="margin-left:25px;">- Bước 3: Ban quản lý xác nhận thông tin khách hàng;</p> 
                            <p style="margin-left:25px;">- Bước 4: Ban quản lý sàn giao hàng;</p> 
                            <p style="margin-left:25px;">- Bước 5: Khách hàng nhận hàng và thanh toán;</p> 
                            
                            <h1>III. ĐẢM BẢO AN TOÀN GIAO DỊCH:</h1>
                            <p>Ban quản lý đã sử dụng các dịch vụ để bảo vệ thông tin và việc thanh toán của khách hàng. Để đảm bảo các giao dịch được tiến hành thành công, hạn chế tối đa rủi ro có thể phát sinh, yêu cầu các Thành viên tham gia Sàn giao dịch TMĐT BUY MORE lưu ý và tuân thủ các nội dung cam kết như sau:</p>  
                          <p>
                           a) Bảo vệ là việc hỗ trợ cho thành viên, hệ thống của Sàn giao dịch BUY MORE được thiết kế để thành viên có thể không đặt hàng cho đến khi thành viên an toàn thoát khỏi chế độ đặt hàng;
                  </p>
                            
                            <p>b) Ngay sau khi thành viên nhấp vào "Mua" trình duyệt của thành viên sẽ đi vào chế độ an toàn. Dữ liệu liên quan đến đặt hàng của thành viên, thông tin cá nhân của thành viên và chi tiết thanh toán sẽ đi qua tất cả các máy chủ của chúng tôi với hình thức mã hóa. Ngay sau khi thành viên đặt hàng đã hoàn thành thành viên nên thoát khỏi chế độ an toàn.</p>
                            <p>c) Thành viên không nên đưa thông tin chi tiết về việc thanh toán với bất kỳ ai bằng e-mail, chúng tôi không chịu trách nhiệm về những mất mát thành viên có thể gánh chịu trong việc trao đổi thông tin của thành viên qua internet hoặc e-mail.</p>
                            <p>d) Thành viên tuyệt đối không sử dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ liệu. Nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp, phá hoại hay xâm của hệ thống website. Mọi vi phạm sẽ bị xử lý theo Quy chế và quy định của pháp luật.</p> 
                              <h1>IV. BẢO VỆ QUYỀN LỢI KHÁCH HÀNG:</h1>
                            <p>- Để bảo đảm quyền lợi của thành viên, Ban quản lý Sàn đề nghị các cá nhân khi đăng ký là thành viên, phải thực hiện các yêu cầu sau:</p>  
                          <p style="margin-left:20px;">+ Cung cấp đầy đủ thông tin cá nhân có liên quan như: Họ và tên, địa chỉ liên lạc, email, số chứng minh nhân dân, điện thoại, số tài khoản, số thẻ thanh toán …., và chịu trách nhiệm về tính pháp lý của những thông tin trên. Ban quản lý Sàn và Công ty TNHH BUY MORE không chịu trách nhiệm cũng như không giải quyết mọi khiếu nại có liên quan đến quyền lợi của thành viên đó nếu xét thấy tất cả thông tin cá nhân của thành viên đó cung cấp khi đăng ký ban đầu là không chính xác;
                  </p>
                            
                            <p style="margin-left:20px;"> + Xem xét kỹ các thông tin liên quan đến các sản phẩm dịch vụ đang khuyến mại trên Sàn giao dịch về: giá, thương hiệu, các dịch vụ hổ trợ cụ thể, điều kiện sử dụng, địa chỉ, phương thức giao hàng, phương thức thanh toán, số tài khoản ngân hàng và các thông tin có liên quan …mà Ban quản lý Sàn đã yêu cầu các thương nhân thực hiện khuyến mại cung cấp thông tin, kể cả các thông tin có liên quan đến thương nhân thực hiện khuyến mại như: tên doanh nghiệp, điện thoại liên lạc, địa chỉ trụ sở chính, địa điểm kinh doanh, nickname yahoo, nick skype để thành viên trực tiếp liên lạc và thực hiện các giao dịch mua sản phẩm, dịch vụ được khuyến mại;</p>
                            <p>- Thành viên khi truy cập vào trang web www.nhommua.com đều biết và hiểu rằng: việc thành viên mua hàng hóa, dịch vụ khuyến mại trên Sàn giao dịch đều do các thương nhân có nhu cầu thực hiện khuyến mại thực hiện thông qua dịch vụ của BUY MORE, Ban quản lý Sàn BUY MORE chỉ thực hiện quảng bá các chương trình khuyến mại cho các hàng hóa, dịch vụ đến các thành viên theo ủy quyền của các thương nhân khác, nên các thương nhân thực hiện khuyến mại sẽ trực tiếp chịu mọi trách nhiệm có liên quan đến chất lượng hàng hóa, dịch vụ khuyến mại theo đúng cam kết đã công bố trên sàn giao dịch.</p>
                            <p>- Thành viên có quyền trực tiếp gửi khiếu nại và yêu cầu bồi thường đến thương nhân thực hiện khuyến mại nếu thành viên có chứng cứ cho rằng hàng hóa, dịch vụ do thương nhân đó cung cấp không đảm bảo chất lượng, thông số kỹ thuật, chế độ bảo hành sản phẩm…. như các thông tin đã công bố trên Sàn giao dịch.</p> 
                            <p>- Thành viên có thể gửi khiếu nại thông qua kênh chăm sóc khách hàng của Ban quản lý Sàn giao dịch BUY MORE, khi nhận được các thông tin khiếu nại của thành viên, Ban quản lý Sàn giao dịch sẽ hỗ trợ thành viên chuyển ngay khiếu nại đó đến các thương nhân có liên quan bằng các phương thức nhanh nhất.</p>
                            <p>- BUY MORE sẽ thực hiện mọi nỗ lực hợp lý để giải quyết các khiếu nại của thành viên truy cập hay sử dụng các dịch vụ trên sàn giao dịch BUY MORE (nếu có). Nếu những nỗ lực đó thất bại, bằng cách sử dụng trang web này thành viên đồng ý rằng bất kỳ khiếu nại, tranh chấp của thành viên có thể có đối với BUY MORE đều được giải quyết theo đúng quy định của pháp luật Việt Nam, và tổng trách nhiệm của BUY MORE không vượt quá số tiền mà BUY MORE thu được từ thành viên đối với vụ việc có liên quan đến khiếu nại của thành viên.</p>
                            <p>- Mọi thông tin giao dịch được bảo mật, trừ trường hợp buộc phải cung cấp khi Cơ quan pháp luật yêu cầu.</p>
                            
                            <h1>V. QUẢN LÝ THÔNG TIN XẤU:</h1>
                            <p>a) Thành viên sẽ tự chịu trách nhiệm về bảo mật và lưu giữ mọi hoạt động sử dụng dịch vụ dưới tên đăng ký, mật khẩu và hộp thư điện tử của mình.</p>  
                          <p>
                          b) Thành viên có trách nhiệm thông báo kịp thời cho Sàn Giao dịch Thương mại điện tử BUY MORE về những hành vi sử dụng trái phép, lạm dụng, vi phạm bảo mật, lưu giữ tên đăng ký và mật khẩu của bên thứ ba để có biện pháp giải quyết phù hợp.
                  </p>
                            
                            <p>c) Thành viên không sử dụng dịch vụ của Sàn giao dịch TMĐT BUY MORE vào những mục đích bất hợp pháp, không hợp lý, lừa đảo, đe doạ, thăm dò thông tin bất hợp pháp, phá hoại, tạo ra và phát tán virus gây hư hại tới hệ thống, cấu hình, truyền tải thông tin của Sàn giao dịch TMĐT BUY MORE hay sử dụng dịch vụ của mình vào mục đích đầu cơ, lũng đoạn thị trường tạo những đơn đặt hàng giả, kể cả phục vụ cho việc phán đoán nhu cầu thị trường. Trong trường hợp vi phạm thì thành viên phải chịu trách nhiệm về các hành vi của mình trước pháp luật.</p>
                            
                            <p>d) Thành viên không được thay đổi, chỉnh sửa, gán gép, copy, truyền bá, phân phối, cung cấp và tạo những chức năng tương tự của dịch vụ do Sàn giao dịch TMĐT BUY MORE cung cấp cho một bên thứ ba nếu không được sự đồng ý của Sàn giao dịch TMĐT BUY MORE trong bản Quy chế này.</p>
                            
                            <p>e) Thành viên không được hành động gây mất uy tín của Sàn giao dịch MTĐT BUY MORE dưới mọi hình thức như gây mất đoàn kết giữa các thành viên bằng cách sử dụng tên đăng ký thứ hai, thông qua một bên thứ ba hoặc tuyên truyền, phổ biến những thông tin không có lợi cho uy tín của Sàn giao dịch TMĐT BUY MORE.</p> 
                            <h1>VI. GIỚI HẠN TRÁCH NHIỆM TRONG TRƯỜNG HỢP PHÁT SINH LỖI KỸ THUẬT TRÊN SÀN GIAO DỊCH:</h1>
                            <p>Bởi vì BUY MORE không kiểm soát an ninh của Internet hoặc các mạng khác mà thành viên sử dụng để truy cập vào trang web hoặc liên lạc BUY MORE, nên BUY MORE không thể và không chịu trách nhiệm về sự an toàn của thông tin mà Thành viên chọn để giao dịch với BUY MORE. Ngoài ra, BUY MORE không chịu trách nhiệm đối với bất kỳ dữ liệu bị mất trong quá trình truyền.</p>  
                          <p>Khi thực hiện các giao dịch trên Sàn, bắt buộc các thành viên phải thực hiện đúng theo các quy trình hướng dẫn. </p>
                            
                          <p>Ban quản lý Sàn giao dịch TMĐT BUY MORE cam kết cung cấp chất lượng dịch vụ tốt nhất cho các thành viên tham gia giao dịch. Trường hợp phát sinh lỗi kỹ thuật, lỗi phần mềm hoặc các lỗi khách quan khác dẫn đến Thành viên không thể tham gia giao dịch được thì các Thành viên thông báo cho Ban quản lý Sàn giao dịch TMĐT quan địa chỉ email: info@nhommua.com . Ban quản lý Sàn sẽ khắc phục lỗi trong thời gian sớm nhất, tạo điều kiện cho các Thành viên tham gia Sàn giao dịch TMĐT BUY MORE;</p>
                            
                           <p>Tuy nhiên, Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ không chịu trách nhiệm giải quyết trong trường hợp khiếu nại, thông báo của các Thành viên không đến được Ban quản lý, phát sinh từ lỗi kỹ thuật, lỗi đường truyền, phần mềm hoặc các lỗi khác không do Ban quản lý gây ra.</p>
                          <h1>VII. QUYỀN VÀ TRÁCH NHIỆM CỦA BAN QUẢN LÝ SÀN GIAO DỊCH TMĐT BUY MORE:</h1>
                          <p><b>1. Quyền của Ban quản lý Sàn giao dịch TMĐT BUY MORE</b></p>  
                          <p>- Sàn giao dịch TMĐT BUY MORE sẽ tổ chức giới thiệu các chương trình khuyến mại các sản phẩm, dịch vụ của các thương nhân khác với mức giá ưu đãi đến các thành viên đăng ký tham gia sau khi đã hoàn thành các thủ tục đăng ký kê khai trực tuyến các thông tin cá nhân có liên quan và các điều kiện bắt buộc mà Sàn giao dịch TMĐT BUY MORE nêu ra. </p>
                            
                          <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE có trách nhiệm yêu cầu các thương nhân thực hiện khuyến mại phải cung cấp đầy đủ và chịu trách nhiệm pháp lý về các thông tin có liên quan đến sản phẩm dịch vụ khuyến mại.</p>
                            
                            <p>- Trong trường hợp có cơ sở để chứng minh thành viên cung cấp thông tin cho Sàn giao dịch TMĐT BUY MORE không chính xác, sai lệch, không đầy đủ hoặc vi phạm pháp luật hay thuần phong mỹ tục Việt Nam thì Ban quản lý Sàn giao dịch TMĐT BUY MORE có quyền từ chối, tạm ngừng hoặc chấm dứt quyền sử dụng dịch vụ của thành viên.</p>
                            <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE có thể chấm dứt quyền thành viên và quyền sử dụng một hoặc tất cả các dịch vụ của thành viên và sẽ thông báo cho thành viên trong thời hạn ít nhất là một (01) ngày trong trường hợp thành viên vi phạm các Quy chế của Sàn giao dịch TMĐT BUY MORE hoặc có những hành vi ảnh hưởng đến hoạt động kinh doanh trên Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ xem xét việc chấm dứt quyền sử dụng dịch vụ và quyền thành viên của thành viên nếu thành viên không tham gia hoạt động giao dịch và trao đổi thông tin trên Sàn giao dịch TMĐT BUY MORE liên tục trong ba (03) tháng. Nếu muốn tiếp tục trở thành thành viên và được cấp lại quyền sử dụng dịch vụ thì phải đăng ký lại từ đầu theo mẫu và thủ tục của Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE có thể chấm dứt ngay quyền sử dụng dịch vụ và quyền thành viên của thành viên nếu Sàn giao dịch TMĐT BUY MORE phát hiện thành viên bị kết án hoặc đang trong thời gian thụ án, trong trường hợp thành viên tiếp tục hoạt động có thể gây cho Sàn giao dịch TMĐT BUY MORE trách nhiệm pháp lý, có những hoạt động lừa đảo, giả mạo, gây rối loạn thị trường, gây mất đoàn kết đối với các thành viên khác của Sàn giao dịch TMĐT BUY MORE , hoạt động vi phạm pháp luật hiện hành của Việt Nam. Trong trường hợp chấm dứt quyền thành viên và quyền sử dụng dịch vụ thì tất cả các chứng nhận, các quyền của thành viên được cấp sẽ mặc nhiên hết giá trị và bị chấm dứt.</p>
                            <p>- Sàn giao dịch TMĐT BUY MORE giữ bản quyền sử dụng dịch vụ và các nội dung trên Sàn giao dịch TMĐT BUY MORE theo luật bản quyền quốc tế và các quy định pháp luật về bảo hộ sở hữu trí tuệ tại Việt Nam. "Sàn giao dịch TMĐT BUY MORE ", và tất cả các biểu tượng, nội dung theo các ngôn ngữ khác nhau đều thuộc quyền sở hữu của Công ty TNHH BUY MORE. Nghiêm cấm mọi hành vi sao chép, sử dụng và phổ biến bất hợp pháp các quyền sở hữu trên.</p>
                           <p><b>2. Trách nhiệm của Ban quản lý Sàn giao dịch TMĐT BUY MORE</b></p>  
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE chịu trách nhiệm xây dựng Sàn giao dịch bao gồm một số công việc chính như: nghiên cứu, thiết kế, mua sắm các thiết bị phần cứng và phần mềm, kết nối Internet, xây dựng chính sách phục vụ cho hoạt động Sàn giao dịch TMĐT BUY MORE trong điều kiện và phạm vi cho phép.</p>
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ tiến hành triển khai và hợp tác với các đối tác trong việc xây dựng hệ thống các dịch vụ, các công cụ tiện ích phục vụ cho việc giao dịch của các thành viên tham gia và người sử dụng trên Sàn giao dịch TMĐT BUY MORE.</p>
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE chịu trách nhiệm định hướng, xây dựng, bổ sung hệ thống các kiến thức, thông tin về: nghiệp vụ ngoại thương, thương mại điện tử, thủ công mỹ nghệ, hệ thống văn bản pháp luật thương mại trong nước và quốc tế, thị trường nước ngoài, cũng như các tin tức có liên quan đến hoạt động của Sàn giao dịch TMĐT BUY MORE.</p>
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ tiến hành các hoạt động xúc tiến, quảng bá Sàn giao dịch TMĐT BUY MORE ra thị trường nước ngoài trong phạm vi và điều kiện cho phép, góp phần mở rộng, kết nối đáp ứng các nhu cầu tìm kiếm bạn hàng và phát triển thị trường nước ngoài của các thành viên tham gia Sàn giao dịch TMĐT BUY MORE .</p>
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ cố gắng đến mức cao nhất trong phạm vi và điều kiện có thể để duy trì hoạt động bình thường của Sàn giao dịch TMĐT BUY MORE và khắc phục các sự cố như: sự cố kỹ thuật về máy móc, lỗi phần mềm, hệ thống đường truyền internet, nhân sự, các biến động xã hội, thiên tai, mất điện, các quyết định của cơ quan nhà nước hay một tổ chức liên quan thứ ba. Tuy nhiên nếu những sự cố trên xẩy ra nằm ngoài khả năng kiểm soát, là những trường hợp bất khả kháng mà gây thiệt hại cho thành viên thì Sàn giao dịch TMĐT BUY MORE không phải chịu trách nhiệm liên đới.</p>
                           <p>- Ban quản lý Sàn giao dịch TMĐT BUY MORE sẽ tư vấn cho các thành viên thực hiện quá trình mua bán qua Sàn giao dịch TMĐT BUY MORE đặc biệt là việc áp dụng chức năng thanh toán trực tuyến.</p>
                           <h1>VIII. QUYỀN VÀ TRÁCH NHIỆM CỦA THÀNH VIÊN, NGƯỜI TRUY CẬP:</h1>
                            <p><b>1. Quyền của thành viên</b></p>  
                            <p>- Đối với các thành viên tham gia Sàn giao dịch TMĐT BUY MORE sẽ được miễn phí thành viên. Phí thành viên được hiểu là khoản phí để được tham gia hoạt động trên Sàn giao dịch TMĐT BUY MORE không tính đến các khoản phí khác như phí thuê quảng cáo, các dịch vụ tư vấn, các khoản phí khác trên Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>- Thành viên sẽ được cấp một tên đăng ký và mật khẩu riêng để được vào sử dụng các dịch vụ và các giao dịch của mình trên Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>- Thành viên sẽ được nhân viên của Sàn giao dịch TMĐT BUY MORE hỗ trợ để sử dụng được các công cụ, các tính năng phục vụ cho việc tiến hành giao dịch và sử dụng các dịch vụ tiện ích trên Sàn giao dịch TMĐT BUY MORE.</p>
                            <p>- Thành viên có quyền đóng góp ý kiến cho Sàn giao dịch TMĐT BUY MORE trong quá trình hoạt động. Các kiến nghị được gửi trực tiếp bằng thư, fax hoặc email đến cho Sàn giao dịch TMĐT BUY MORE.</p>
                            <p><b>2. Trách nhiệm của thành viên</b></p>  
                            <p>- Thành viên sẽ tự chịu trách nhiệm về bảo mật và lưu giữ và mọi hoạt động sử dụng dịch vụ dưới tên đăng ký, mật khẩu và hộp thư điện tử của mình. Thành viên có trách nhiệm thông báo kịp thời cho Sàn giao dịch TMĐT BUY MORE về những hành vi sử dụng trái phép, lạm dụng, vi phạm bảo mật, lưu giữ tên đăng ký và mật khẩu của mình để hai bên cùng hợp tác xử lý.</p>
                            <p>- Thành viên cam kết những thông tin cung cấp cho Sàn giao dịch TMĐT BUY MORE và những thông tin đang tải lên Sàn giao dịch TMĐT BUY MORE là chính xác và hoàn chỉnh. Thành viên đồng ý giữ và thay đổi các thông tin trên Sàn giao dịch TMĐT BUY MORE là cập nhật, chính xác và hoàn chỉnh.</p>
                            <p>- Thành viên cam kết, đồng ý không sử dụng dịch vụ của Sàn giao dịch TMĐT BUY MORE vào những mục đích bất hợp pháp, không hợp lý, lừa đảo, đe doạ, thăm rò thông tin bất hợp pháp, phá hoại, tạo ra và phát tán virus gây hư hại tới hệ thống, cấu hình, truyền tải thông tin của Sàn giao dịch TMĐT BUY MORE hay sử dụng dịch vụ của mình vào mục đích đầu cơ, lũng đoạn thị trường tạo những đơn đặt hàng, chào hàng giả, kể cả phục vụ cho việc phán đoán nhu cầu thị trường. Trong trường hợp vi phạm thì thành viên phải chịu trách nhiệm về các hành vi của mình trước pháp luật.</p>
                            <p>- Thành viên cam kết không được thay đổi, chỉnh sửa, gán gép, copy, truyền bá, phân phối, cung cấp và tạo những công cụ tương tự của dịch vụ do Sàn giao dịch TMĐT BUY MORE cung cấp cho một bên thứ ba nếu không được sự đồng ý của Sàn giao dịch TMĐT BUY MORE trong bản Quy chế này.</p>
                            <p>- Thành viên không được hành động gây mất uy tín của Sàn giao dịch TMĐT BUY MORE dưới mọi hình thức như gây mất đoàn kết giữa các thành viên bằng cách sử dụng tên đăng ký thứ hai, thông qua một bên thứ ba hoặc tuyên truyền, phổ biến những thông tin không có lợi cho uy tín của Sàn giao dịch TMĐT BUY MORE.</p>
                            <h1>IX. ĐIỀU KHOẢN ÁP DỤNG :</h1>
                            <p>- Quy chế của Sàn giao dịch TMĐT BUY MORE chính thức có hiệu lực thi hành kể từ ngày ký Quyết định ban hành kèm theo Quy chế này. BUY MORE có quyền và có thể thay đổi Quy chế này bằng cách thông báo lên Sàn giao dịch TMĐT BUY MORE cho các thành viên biết. Quy chế sửa đổi có hiệu lực kể từ ngày Quyết định về việc sửa đổi Quy chế có hiệu lực. Việc thành viên tiếp tục sử dụng dịch vụ sau khi Quy chế sửa đổi được công bố và thực thi đồng nghĩa với việc họ đã chấp nhận Quy chế sửa đổi này.</p>
                            <p>- Địa chỉ liên lạc chính thức của Sàn giao dịch TMĐT BUY MORE là:</p>
                            <p><b>Tại thành phố Hồ Chí Minh</b></p> 
                            <p style="margin-left:20px;">  Địa chỉ: 331 Nguyễn Trọng Tuyển, P. 10, Q. Phú Nhuận.</p> 
                            <p style="margin-left:20px;">  Điện thoại: 0984137119.</p> 
                            <p style="margin-left:20px;">  Email: <a href="mailto:support@buymore.com.vn">support@buymore.com.vn</a>.</p>
                            <p><b>Tại thành phố Hà Nội</b></p> 
                            <p style="margin-left:20px;">  Địa chỉ: Tầng 4 – Lô 07-3A Khu CN Hoàng Mai, Quận Hoàng Mai.</p> 
                            <p style="margin-left:20px;">  Email: <a href="mailto:support@buymore.com.vn">support@buymore.com.vn</a>.</p>
                            <h1>X. ĐIỀU KHOẢN CAM KẾT:</h1>
                            <p>Ban quản lý Sàn giao dịch thương mại điện tử BUY MORE và Thành viên (người truy cập) đồng ý cam kết thực hiện đúng các điều khoản trong nội dung bản Quy chế này.</p>
