<?php
	$khachhang = new khachhangCTL();
?>
            <div class="top-content">
            <form  method="post">
                <h2 class="title">Quản lý khách hàng</h2>
                <div type="submit" onclick="moveModal('modal-add-customer')" class="btn-add">Thêm khách hàng</div>
                <input type="text" class="search-input" name="id-cus-search" placeholder="Tìm mã hoặc tên khách hàng">
                <button class="btn-quick-search" name="search-id"><i class="fas fa-search"></i></button>
            </div>
            <div class="center-content">
                <button class="icon-list" name="icon-list">
                <i class="fas fa-user sidebar-icon"></i>
                </button>
                <div class="search-second">
                    <label class ="text-search"for="">Số điện thoại</label>
                    <input style="width:115px" name="sdt-cus-search" type="text" placeholder="Nhập số điện thoại">
                </div>
                <div class="search-addres">
                    <label class ="text-search"for="">Địa chỉ</label>
                    <input  type="text" name="addres-cus-search" placeholder="Nhập địa chỉ">
                </div>
                <div class="search">
                    <button class="btn-search" name="search">Lọc</button>
                </div>
            </div>
            <div class="bot-content">
            <?php echo $khachhang->add(); ?>
            <?php echo $khachhang->edit(); ?>
            <?php echo $khachhang->delete(); ?>
            <?php $khachhang_list = $khachhang->findAll(); ?>
                <table>
                    <thead>                            
                        <th style="width:5%">STT</th>
                        <th style="width:10%">ID</th>
                        <th style="width:15%">Tên</th>
                        <th style="width:8%">Số điện thoại</th>
                        <th style="width:15%">Email</th>
                        <th style="width:25%">Địa chỉ</th>
                        <th style="width:5%">Mã TK</th>
                        <th style="width:5%">Tùy chỉnh</th>
                    </thead>
                    <tbody>
                    <?php $i=1; $phone_list = [];$email_list=[]; foreach ($khachhang_list as $kh) {
                                array_push($phone_list, $kh->getSdt());
                                array_push($email_list, $kh->getEmail());
                        ?>
                            <tr> 
                                <td><?php echo $i?></td> 
                                <td><?php echo $kh->getMakh();?></td> 
                                <td><?php echo $kh->getTenkh();?></td>
                                <td><?php echo $kh->getSdt();?></td>
                                <td><?php echo $kh->getEmail();?></td>
                                <td><?php echo $kh->getDckh();?></td>
                                <td><?php echo $kh->getMatk();?></td>
                                <td style="display:flex;">
                                    <div class="icon-option" style="background-color: rgb(93, 184, 93);" id="icon-edit"  onclick="moveEdit('modal-edit-customer','<?php echo $kh->getMakh();?>','<?php echo $kh->getTenkh();?>','<?php echo $kh->getMakh();?>','<?php echo $kh->getEmail();?>','<?php echo $kh->getSdt();?>','<?php echo $kh->getDckh();?>','<?php echo $kh->getMatk();?>','<?php echo $kh->getMakh();?>')">
                                        <i class="fas fa-edit"></i>
                                    </div>  
                                    <div type ="submit" class="icon-option" style="background-color: rgb(255, 80, 80);" id="icon-delete" name="id-dele" value="<?php echo $kh->getMakh();?>" onclick="xacnhanDelete('xacnhan-delete','<?php echo $kh->getMakh();?>','id-dele')">
                                        <i class="fas fa-trash-alt"></i>
                                        <input style="display:none;" type="text" name="id-dele" value="<?php echo $kh->getMakh();?>">
                                    </div>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        }
                        $phones = json_encode($phone_list);
                        $emails = json_encode($email_list);
						?>
                    </tbody> 
                </table>

                <div class="xacnhan-delete" id="xacnhan-delete">
                <div class="text-xacnhan" id="text-xacnhan" >Xác nhận xóa nhân viên <span id="id-dele"></span> ?</div>
                    <button type="submit" class="bnt-select" id="btn-delete" name="delete-cus">OK</button>
                    <div class="bnt-select" id="btn-back" onclick="exitXacnhan('xacnhan-delete')">Không</div>
                </div>
            
                <div class="modal-add" id="modal-add-customer">
                    <div style="height:400px" class="view-info">
                        <div class="exit-view-info" onclick="exitAdd('modal-add-customer')">X</div>
                        <div class="info">
                            <div class="text-info">
                                <ul>
                                    <li>Mã</li>
                                    <li>Tên</li>
                                    <li>Email</li>
                                    <li>SĐT</li>
                                    <li>Địa chỉ</li>
                                    <li>Mã TK</li>
                                </ul>
                            </div>
                            <?php $newid = $khachhang->newMaKH(); ?>
                            
                            <!-- <form id="form-add" method="post"> -->
                            <div class="input-info">
                            
                                <ul class="input">
                                    <li >
                                        <input type="text" id="id-cus-input" name="id-cus-input" class="li"  placeholder="Nhập mã" value="<?php echo $newid; ?>" readonly>
                                        <div class="error" id="error-ma-kh"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="name-cus-input" name="name-cus-input" class="li"  placeholder="Nhập tên" value="">
                                        <div class="error" id="error-ten-kh"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="email-cus-input" name="email-cus-input" class="li"  placeholder="Nhập mã email" value="">
                                        <div class="error" id="error-mail-kh"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="phone-cus-input" name="phone-cus-input" class="li"  placeholder="Nhập số điện thoại" value="">
                                        <div class="error" id="error-sdt-kh"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="addres-cus-input" name="addres-cus-input" class="li"  placeholder="Nhập địa chỉ" value="">
                                        <div class="error" id="error-diachi-kh"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="idtk-cus-input" name="idtk-cus-input" class="li"  placeholder="Nhập mã tài khoản" value="">
                                        <div class="error" id="error-matk-kh"></div>                                    
                                    </li>
                                </ul>
                            </div>
                            <!-- </form> -->
                           <span style="display:none" id='span-phones-kh'><?php echo $phones?></span>
                           <span style="display:none" id='span-email-kh'><?php echo $emails?></span>
                            <div style="bottom:50px" class="btn-xacnhan" onclick="xacnhanAdd('khachhang')">Hoàn tất</div>
                        </div>
                    </div>
                    <!-- </form> -->
                    
                    <div class="view-xacnhan" id="add-xacnhan-customer" style="top:150px">
                        <div class="text-xacnhan">Xác nhận thêm khách hàng <span id="id-add-cus"></span> ?</div>
                        <button class="bnt-select" id="btn-add" name="add-cus">OK</button>
                        <div class="bnt-select" id="btn-back" onclick="exitXacnhan('add-xacnhan-customer')">Không</div>
                    </div>
                </div>

                <div class="modal-edit" id="modal-edit-customer">
                    <div class="view-info" style="height:400px">
                        <div class="exit-view-info" onclick="exitAdd('modal-edit-customer')">X</div>
                        <div class="info">
                            <div class="text-info">
                                <ul>
                                    <li>Mã</li>
                                    <li>Tên</li>
                                    <li>Email</li>
                                    <li>SĐT</li>
                                    <li>Địa chỉ</li>
                                    <li>Mã TK</li>
                                </ul>
                            </div>
                            
                            <!-- <form id="form-add" method="post"> -->
                            <div class="input-info">
                            
                                <ul class="input">
                                    <li >
                                        <input type="text" id="id-cus-edit" name="id-cus-edit" class="li"  placeholder="Nhập mã" value="" readonly>
                                        <div class="error" id="error-ma-kh-edit"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="name-cus-edit" name="name-cus-edit" class="li"  placeholder="Nhập tên" value="">
                                        <div class="error" id="error-ten-kh-edit"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="email-cus-edit" name="email-cus-edit" class="li"  placeholder="Nhập mã email" value="">
                                        <div class="error" id="error-mail-kh-edit"></div>
                                        <span id="email-current"></span>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="phone-cus-edit" name="phone-cus-edit" class="li"  placeholder="Nhập số điện thoại" value="">
                                        <div class="error" id="error-sdt-kh-edit"></div>  
                                        <span id="phone-current"></span>                                   
                                    </li>
                                    <li >
                                        <input type="text" id="addres-cus-edit" name="addres-cus-edit" class="li"  placeholder="Nhập địa chỉ" value="">
                                        <div class="error" id="error-diachi-kh-edit"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="idtk-cus-edit" name="idtk-cus-edit" class="li"  placeholder="Nhập mã tài khoản" value="">
                                        <div class="error" id="error-matk-kh-edit"></div>                                    
                                    </li>
                                </ul>
                            </div>
                            <!-- </form> -->
                            <div style="bottom:50px" class="btn-xacnhan" onclick="xacNhanEdit('khachhang')">Cập nhật</div>
                        </div>
                    </div>
                    <!-- </form> -->
                    
                    <div style="width:350px;top:200px" class="view-xacnhan" id="edit-xacnhan-customer">
                        <div class="text-xacnhan">Xác nhận cập nhật khách hàng <span id="id-edit-cus"></span> ?</div>
                        <button class="bnt-select" id="btn-edit" name="edit-cus">OK</button>
                        <div class="bnt-select" id="btn-back" onclick="exitXacnhan('edit-xacnhan-customer')">Không</div>
                    </div>
                    </form>
                </div>
            </div>
