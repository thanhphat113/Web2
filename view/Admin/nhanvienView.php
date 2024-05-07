<?php
	$nhanvien = new nhanvienCTL();
?>
<body>
        <div class="main-content">
            <div class="top-content">
            <form  method="post">
                <h2 class="title">Quản lý nhân viên</h2>
                <div type="submit" onclick="moveModal('modal-add-employee')" class="btn-add">Thêm nhân viên</div>
                <input type="text" class="search-input" name="id-epl-search" placeholder="Tìm mã hoặc tên nhân viên">
                <button class="btn-quick-search" name="search-id"><i class="fas fa-search"></i></button>
            </div>
            <div class="center-content">
                <button class="icon-list" name="icon-list">
                <i class="fas fa-user-tie sidebar-icon"></i>
                </button>
                <div class="search-gender">
                    <label class ="text-search"for="gender">Giới tính:</label>
                    <select style="font-weight: 550;" id="gender-search" name="gender-epl-search">
                        <option style="width:50px"  class ="text-search" ></option>
                        <option style="width:50px"  class ="text-search" value="Nam">Nam</option>
                        <option style="width:50px"  class ="text-search" value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="search-second">
                    <label class ="text-search"for="">Ngày sinh</label>
                    <input style="width:100px" name="birt-epl-search" type="date">
                </div>
                <div class="search-addres">
                    <label class ="text-search"for="">Địa chỉ</label>
                    <input  type="text" name="addres-epl-search">
                </div>
                <div class="search">
                    <button class="btn-search" name="search">Lọc</button>
                </div>
            </div>
            <div class="bot-content">
            <?php echo $nhanvien->delete();?>
            <?php echo $nhanvien->add(); ?>
            <?php echo $nhanvien->edit(); ?>
            <?php $nhanvien_list = $nhanvien->findAll(); ?>
                <table>
                    <thead>                            
                        <th style="width:5%">STT</th>
                        <th style="width:7%">ID</th>
                        <th style="width:13%">Tên</th>
                        <th style="width:7%">Giới tính</th>
                        <th style="width:8%">Ngày sinh</th>
                        <th style="width:8%">Số điện thoại</th>
                        <th style="width:25%">Địa chỉ</th>
                        <th style="width:15%">Email</th>
                        <th style="width:5%">Mã TK</th>
                        <th style="width:15%">Tùy chỉnh</th>
                    </thead>
                    <tbody>
                    <?php $i=1; $phone_list = [];$email_list=[]; foreach ($nhanvien_list as $nv) {
                                array_push($phone_list, $nv->getSdt());
                                array_push($email_list, $nv->getEmail());
                        ?>
                            <tr> 
                                <td><?php echo $i?></td> 
                                <td><?php echo $nv->getManv();?></td> 
                                <td><?php echo $nv->getTennv();?></td>
                                <td><?php echo $nv->getGtnv();?></td>
                                <td><?php echo $nv->getNsnv();?></td>
                                <td><?php echo $nv->getSdt();?></td>
                                <td><?php echo $nv->getDcnv();?></td>
                                <td><?php echo $nv->getEmail();?></td>
                                <td><?php echo $nv->getMatk();?></td>
                                <td style="display:flex;">
                                    <div class="icon-option" style="background-color: rgb(93, 184, 93);" id="icon-edit" value="<?php echo $nv->getManv();?>" onclick="moveEdit('modal-edit-employee','<?php echo $nv->getManv();?>','<?php echo $nv->getTennv();?>','<?php echo $nv->getNsnv();?>','<?php echo $nv->getEmail();?>','<?php echo $nv->getSdt();?>','<?php echo $nv->getDcnv();?>','<?php echo $nv->getMatk();?>','<?php echo $nv->getGtnv();?>')">
                                        <i class="fas fa-edit"></i>
                                    </div>  
                                    <div type ="submit" class="icon-option" style="background-color: rgb(255, 80, 80);" id="icon-delete" name="id-dele" value="<?php echo $nv->getManv();?>" onclick="xacnhanDelete('xacnhan-delete','<?php echo $nv->getManv();?>','id-dele')">
                                        <i class="fas fa-trash-alt"></i>
                                        <input style="display:none;" type="text" name="id-dele" value="<?php echo $nv->getManv();?>">
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
                    <button type="submit" class="bnt-select" id="btn-delete" name="delete">OK</button>
                    <div class="bnt-select" id="btn-back" onclick="exitXacnhan('xacnhan-delete')">Không</div>
                </div>

                <div class="modal-add" id="modal-add-employee">
                    <div class="view-info">
                        <div class="exit-view-info" onclick="exitAdd('modal-add-employee')">X</div>
                        <div class="info">
                            <div class="text-info">
                                <ul>
                                    <li>Mã</li>
                                    <li>Tên</li>
                                    <li>Ngày sinh</li>
                                    <li>Email</li>
                                    <li>SĐT</li>
                                    <li>Địa chỉ</li>
                                    <li>Mã TK</li>
                                    <li>Giới tính</li>
                                </ul>
                            </div>
                            <?php $newid = $nhanvien->newMaNV(); ?>
                            
                            <!-- <form id="form-add" method="post"> -->
                            <div class="input-info">
                            
                                <ul class="input">
                                    <li >
                                        <input type="text" id="id-epl-input" name="id-epl-input" class="li"  placeholder="Nhập mã" value="<?php echo $newid; ?>" readonly>
                                        <div class="error" id="error-ma-nv"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="name-epl-input" name="name-epl-input" class="li"  placeholder="Nhập tên" value="">
                                        <div class="error" id="error-ten-nv"></div>
                                    </li>
                                    <li >
                                        <input type="date" id="birt-epl-input" name="birt-epl-input" class="li" value="">
                                        <div class="error" id="error-ngaysinh-nv"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="email-epl-input" name="email-epl-input" class="li"  placeholder="Nhập mã email" value="">
                                        <div class="error" id="error-mail-nv"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="phone-epl-input" name="phone-epl-input" class="li"  placeholder="Nhập số điện thoại" value="">
                                        <div class="error" id="error-sdt-nv"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="addres-epl-input" name="addres-epl-input" class="li"  placeholder="Nhập địa chỉ" value="">
                                        <div class="error" id="error-diachi-nv"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="idtk-epl-input" name="idtk-epl-input" class="li"  placeholder="Nhập mã tài khoản" value="">
                                        <div class="error" id="error-matk-nv"></div>                                    
                                    </li>
                                    <li > 
                                        <input type="radio" name="gender" value="Nam">Nam
                                        <input type="radio" name="gender" value="Nữ">Nữ
                                        <div class="error" id="error-gioitinh-nv"></div>  
                                    </li>
                                </ul>
                            </div>
                            <!-- </form> -->
                           <span style="display:none" id='span-phones'><?php echo $phones?></span>
                           <span style="display:none" id='span-email'><?php echo $emails?></span>
                            <div class="btn-xacnhan" onclick="xacnhanAdd('nhanvien')">Hoàn tất</div>
                        </div>
                    </div>
                    <!-- </form> -->
                    
                    <div class="view-xacnhan" id="add-xacnhan-employee">
                        <div class="text-xacnhan">Xác nhận thêm nhân viên <span id="id-add"></span> ?</div>
                        <button class="bnt-select" id="btn-add" name="add">OK</button>
                        <div class="bnt-select" id="btn-back" onclick="exitXacnhan('add-xacnhan-employee')">Không</div>
                    </div>
                </div>
                <div class="modal-edit" id="modal-edit-employee">
                    <div class="view-info">
                        <div class="exit-view-info" onclick="exitAdd('modal-edit-employee')">X</div>
                        <div class="info">
                            <div class="text-info">
                                <ul>
                                    <li>Mã</li>
                                    <li>Tên</li>
                                    <li>Ngày sinh</li>
                                    <li>Email</li>
                                    <li>SĐT</li>
                                    <li>Địa chỉ</li>
                                    <li>Mã TK</li>
                                    <li>Giới tính</li>
                                </ul>
                            </div>
                            <?php $newid = $nhanvien->newMaNV(); ?>
                            
                            <!-- <form id="form-add" method="post"> -->
                            <div class="input-info">
                            
                                <ul class="input">
                                    <li >
                                        <input type="text" id="id-epl-edit" name="id-epl-edit" class="li"  placeholder="Nhập mã" value="" readonly>
                                        <div class="error" id="error-ma-nv-edit"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="name-epl-edit" name="name-epl-edit" class="li"  placeholder="Nhập tên" value="">
                                        <div class="error" id="error-ten-nv-edit"></div>
                                    </li>
                                    <li >
                                        <input type="date" id="birt-epl-edit" name="birt-epl-edit" class="li" value="">
                                        <div class="error" id="error-ngaysinh-nv-edit"></div>
                                    </li>
                                    <li >
                                        <input type="text" id="email-epl-edit" name="email-epl-edit" class="li"  placeholder="Nhập mã email" value="">
                                        <div class="error" id="error-mail-nv-edit"></div>
                                        <span id="email-current"></span>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="phone-epl-edit" name="phone-epl-edit" class="li"  placeholder="Nhập số điện thoại" value="">
                                        <div class="error" id="error-sdt-nv-edit"></div>  
                                        <span id="phone-current"></span>                                   
                                    </li>
                                    <li >
                                        <input type="text" id="addres-epl-edit" name="addres-epl-edit" class="li"  placeholder="Nhập địa chỉ" value="">
                                        <div class="error" id="error-diachi-nv-edit"></div>                                    
                                    </li>
                                    <li >
                                        <input type="text" id="idtk-epl-edit" name="idtk-epl-edit" class="li"  placeholder="Nhập mã tài khoản" value="">
                                        <div class="error" id="error-matk-nv-edit"></div>                                    
                                    </li>
                                    <li > 
                                        <input type="radio" name="gender" id="Nam" value="Nam">Nam
                                        <input type="radio" name="gender" id="Nu" value="Nữ">Nữ
                                        <div class="error" id="error-gioitinh-nv-edit"></div>  
                                    </li>
                                </ul>
                            </div>
                            <!-- </form> -->
                            <div class="btn-xacnhan" onclick="xacNhanEdit('nhanvien')">Cập nhật</div>
                        </div>
                    </div>
                    <!-- </form> -->
                    
                    <div class="view-xacnhan" id="edit-xacnhan-employee">
                        <div class="text-xacnhan">Xác nhận cập nhật nhân viên <span id="id-edit"></span> ?</div>
                        <button class="bnt-select" id="btn-edit" name="edit">OK</button>
                        <div class="bnt-select" id="btn-back" onclick="exitXacnhan('edit-xacnhan-employee')">Không</div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</body>
