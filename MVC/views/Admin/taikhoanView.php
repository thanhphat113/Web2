<div class="quanly-top-content">
    <form  method="post">
        <h1>Quản lý tài khoản</h1>
        <div type="submit" onclick="moveModal('modal-add-accout')" class="ql-btn-add">Thêm tài khoản</div>
        <input type="text" class="search-input" name="id-acc-search" placeholder="Tìm mã hoặc tên tài khoản">
        <button class="btn-quick-search" name="quick_search"><i class="fas fa-search"></i></button>
</div>
<div class="quanly-center-content">
    <button class="icon-list" name="icon-list">
    <i class="fas fa-clipboard-list sidebar-icon"></i>
    </button>
    <?php if(!empty($data["result"])){?>
                <h3 style="text-align: center;margin-top: 20px;margin-right: 200px;"><?php echo $data["result"]; ?></h3><?php
            }
    ?>
    <div class="search-permission">
        <label class ="text-search"for="permission">Quyền:</label>
        <select style="font-weight: 550;" id="gender-search" name="permission-acc-search">
            <option style="width:50px"  class ="text-search" value="0">Admin(0)</option>
            <option style="width:50px"  class ="text-search" value="1">Nhân viên(1)</option>
            <option style="width:50px"  class ="text-search" value="2">Khách hàng(2)</option>
        </select>
    </div>
    <div class="search-state">
        <label class ="text-search"for="state">Trạng thái:</label>
        <select style="font-weight: 550;" id="gender-search" name="state-acc-search">
            <option style="width:50px"  class ="text-search" value="1">Còn hoạt động (1)</option>
            <option style="width:50px"  class ="text-search" value="0" >Off (0)</option>
        </select>
    </div>
    <div class="search">
        <button class="btn-search" name="search">Lọc</button>
    </div>
</div>
<div class="quanly-bot-content">
        <table class="viewTable">
            <thead id="one-table">                       
                <th style="width:5%">STT</th>
                <th style="width:10%">ID</th>
                <th style="width:20%">Username</th>
                <th style="width:20%">Password</th>
                <th style="width:10%">Quyền</th>
                <th style="width:10%">Trạng Thái</th>
                <th style="width:5%">Tùy chỉnh</th>
            </thead>
            <tbody>
            <?php $i=0;$users = []; foreach ($data['taikhoan_list'] as $tk) {
                array_push($users, $tk->getTentk());
                ?>
                    <tr> 
                        <td><?php echo $i ;?></td> 
                        <td><?php echo $tk->getMatk();?></td> 
                        <td><?php echo $tk->getTentk();?></td>
                        <td><?php echo $tk->getPassword();?></td>
                        <td><?php echo $tk->getMaQuyen();?></td>
                        <td><?php echo $tk->getTrangThai();?></td>
                        <td style="display:flex;">
                            <div class="icon-option" style="background-color: rgb(93, 184, 93);" id="icon-edit" onclick="moveEdit('modal-edit-accout','<?php echo $tk->getMatk();?>','<?php echo $tk->getTentk();?>','<?php echo $tk->getPassword();?>','<?php echo $tk->getPassword();?>','<?php echo $tk->getMaquyen();?>','<?php echo $tk->getTrangthai();?>','<?php echo $tk->getMatk();?>','<?php echo $tk->getMatk();?>','<?php echo $tk->getMatk();?>')" >
                                <i class="fas fa-edit"></i>
                            </div>  
                            <div type ="submit" class="icon-option" style="background-color: rgb(255, 80, 80);" id="icon-delete" name="id-dele" value="<?php echo $tk->getMatk();?>" onclick="xacnhanDelete('xacnhan-delete','<?php echo $tk->getMatk();?>','id-dele')">
                                <i class="fas fa-trash-alt"></i>
                        </td>
                    </tr>
                    <?php $i++;
                    }
                    $users = json_encode($users);
                    ?>
            </tbody> 
        </table>

        <div class="xacnhan-delete" id="xacnhan-delete">
        <div class="text-xacnhan" id="text-xacnhan" >Xác nhận xóa nhân viên <span id="id-dele"></span> ?</div>
            <button type="submit" class="bnt-select" id="btn-delete" name="delete-acc">OK</button>
            <div class="bnt-select" id="btn-back" onclick="exitXacnhan('xacnhan-delete')">Không</div>
        </div>

        <div class="modal-add" id="modal-add-accout">
            <div style="height:400px" class="view-info">
                <div class="exit-view-info" onclick="exitAdd('modal-add-accout')">X</div>
                <div class="info">
                    <div style="width:50%;left:70px" class="text-info">
                        <ul>
                            <li>Mã</li>
                            <li>Tài khoản</li>
                            <li>Mật khẩu</li>
                            <li>Nhập lại mật khẩu</li>
                            <li>Quyền</li>
                        </ul>
                    </div>
                    <div style="left: 40%; width:50%" class="input-info">
                        <ul>
                            <li >
                                <input type="text" id="id-acc-input" name="id-acc-input" class="li"  placeholder="Nhập mã" value="<?php echo $data['newid'];?>" readonly>
                                <div class="error" style="margin-left:10px" id="error-ma-tk"> </div>
                            </li>
                            <li >
                                <input type="text" id="user-acc-input" name="user-acc-input" class="li"  placeholder="Nhập tài khoản" value="">
                                <div class="error" style="margin-left:10px" id="error-user-tk" ></div>
                            </li>
                            <li >
                                <input type="text" id="pass-acc-input" name="pass-acc-input" class="li"  placeholder="Nhập mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass-tk"></div>                                    
                            </li>
                            <li >
                                <input type="text" id="pass2-acc-input" name="pass2-acc-input" class="li"  placeholder="Nhập lại mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass2-tk" ></div>                                                                      
                            </li>
                            <li>
                            <div class="li">
                                <select style="font-weight: 550;width:100px;height:25px" id="quyen-acc-input" name="quyen-acc-input">
                                    <option style="width:800px"  class ="text-search" value="0">Admin</option>
                                    <option style="width:50px"  class ="text-search" value="1">Nhân viên</option>
                                    <option style="width:50px"  class ="text-search" value="2" >Khách hàng</option>
                                </select>
                            </div>
                            <div class="error" id="error-quyen-tk" style="margin-left:10px"></div>   
                            </li>
                        </ul>
                    </div>
                    <span style="display:none" id='span-user-tk'><?php echo $users ?></span>
                    <div style="bottom:60px" class="btn-xacnhan" onclick="xacnhanAdd('taikhoan')">Hoàn tất</div>
                </div>
            </div>
            <div class="view-xacnhan" id="add-xacnhan-accout" style="top:150px">
                <div class="text-xacnhan">Xác nhận thêm tài khoản <span id="id-add-acc"></span> ?</div>
                <button class="bnt-select" id="btn-add" name="add-acc">OK</button>
                <div class="bnt-select" id="btn-back" onclick="exitXacnhan('add-xacnhan-accout')">Không</div>
            </div>
        </div>

        <div class="modal-edit" id="modal-edit-accout">
            <div style="height:400px" class="view-info">
                <div class="exit-view-info" onclick="exitAdd('modal-edit-accout')">X</div>
                <div  class="info">
                    <div style="width:50%;left:70px" class="text-info">
                        <ul>
                            <li>Mã</li>
                            <li>Tài khoản</li>
                            <li>Mật khẩu</li>
                            <li>Nhập lại mật khẩu</li>
                            <li>Quyền</li>
                            <li>Trạng thái</li>
                        </ul>
                    </div>
                    <div style="left: 40%; width:50%" class="input-info">
                        <ul class="input">
                            <li >
                                <input type="text" id="id-acc-edit" name="id-acc-edit" class="li"  placeholder="Nhập mã" value="" readonly>
                                <div class="error" style="margin-left:10px" id="error-ma-tk-edit"> </div>
                            </li>
                            <li >
                                <input type="text" id="user-acc-edit" name="user-acc-edit" class="li"  placeholder="Nhập tài khoản" value="">
                                <div class="error" style="margin-left:10px" id="error-user-tk-edit" ></div>
                                <span id="user-current"></span> 
                            </li>
                            <li >
                                <input type="text" id="pass-acc-edit" name="pass-acc-edit" class="li"  placeholder="Nhập mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass-tk-edit"></div>                                    
                            </li>
                            <li >
                                <input type="text" id="pass2-acc-edit" name="pass2-acc-edit" class="li"  placeholder="Nhập lại mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass2-tk-edit" ></div>                                                                      
                            </li>
                            <li>
                            <div class="li">
                                <select style="font-weight: 550;width:100px;height:25px" id="quyen-acc-edit" name="quyen-acc-edit">
                                    <option style="width:800px"  class ="text-search" value="0">Admin</option>
                                    <option style="width:50px"  class ="text-search" value="1">Nhân viên</option>
                                    <option style="width:50px"  class ="text-search" value="2" >Khách hàng</option>
                                </select>
                            </div>
                            <div class="error" id="error-quyen-tk-edit" style="margin-left:10px"></div>   
                            </li>
                            <li>
                            <div class="li">
                                <select style="font-weight: 550;width:100px;height:25px" id="trangthai-acc-edit" name="trangthai-acc-edit">
                                    <option style="width:800px"  class ="text-search" value="1">On(1)</option>
                                    <option style="width:50px"  class ="text-search" value="0">Off(0)</option>
                                </select>
                            </div>
                            <div class="error" id="error-quyen-tk-edit" style="margin-left:10px"></div>   
                            </li>
                        </ul>
                    </div>
                    <div style = "bottom : 50px" class="btn-xacnhan" onclick="xacNhanEdit('taikhoan')">Cập nhật</div>
                </div>
            </div>
            <div style="top:150px" class="view-xacnhan" id="edit-xacnhan-accout">
                <div class="text-xacnhan">Xác nhận cập nhật tài khoản <span id="id-edit-acc"></span> ?</div>
                <button class="bnt-select" id="btn-edit" name="edit-acc">OK</button>
                <div class="bnt-select" id="btn-back" onclick="exitXacnhan('edit-xacnhan-accout')">Không</div>
            </div>
        </div>
    </form>
</div>
