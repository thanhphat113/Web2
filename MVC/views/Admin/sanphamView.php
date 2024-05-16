<div class="quanly-top-content">
    <form  method="post">
        <h2 class="title">Quản lý sản phẩm</h2> 
        <div style="display:none" type="submit" onclick="moveModal('modal-add-product')" class="btn-add">Thêm sản phẩm</div>
        <input type="text" class="search-input" name="id-pro-search" placeholder="Tìm mã hoặc tên sản phẩm">
        <button class="btn-quick-search" name="quick_search"><i class="fas fa-search"></i></button>
</div>
<div class="quanly-center-content">
    <button class="icon-list" name="icon-list">
    <i class="fas fa-mobile sidebar-icon"></i>
    </button>
    <?php
        if(!empty($data["result"])){?>
            <h3 style="text-align: center;margin-top: 20px;margin-right: 200px;"><?php echo $data["result"]; ?></h3><?php
        }
        ?>
    <div style="right: 450px;"class="search-state">
        <label class ="text-search"for="state">Danh mục:</label>
        <select style="font-weight: 550;" id="gender-search" name="danhmuc-pro-search">
            <option style="width:50px"  class ="text-search" value="IPhone">IPhone</option>
            <option style="width:50px"  class ="text-search" value="IPad" >IPad</option>
            <option style="width:50px"  class ="text-search" value="Macbook" >MacBook</option>
        </select>
    </div>
    <div style="position: absolute;right: 370px;bottom: 0px;" class="search">
        <button class="btn-search" name="search"><i class="fas fa-search"></i></button>
    </div>
    <div class="search-price">
        <label class ="text-search"for="">Giá bán: </label>
        <input style="width: 100px;" type="text" name="min-pro-search" placeholder="Nhập giá bán tối thiểu">
        <input style="width: 100px;" type="text" name="max-pro-search" placeholder="Nhập giá bán tối đa">
    </div>
    <div class="search">
        <button class="btn-search" name="loc">Lọc</button>
    </div>
</div>
    <div class="quanly-bot-content">
        <table class="viewTable">
            <thead id="one-table">                            
                <th style="width:5%">STT</th>
                <th style="width:10%">Hình ảnh</th>
                <th style="width:10%">Mã chi tiết</th>
                <th style="width:30%">Tên sản phẩm</th>
                <th style="width:10%">Màu sắc</th>
                <th style="width:10%">Cấu hình</th>
                <th style="width:10%">Giá bán</th>
                <th style="width:7.5%">Bảo hành</th>
                <th style="width:7.5%">Số lượng</th>
                <th style="width:10%">Xem chi tiết</th>
            </thead>
            <tbody>
                <?php $i=0;$list_ten = []; foreach ($data['giasanpham_list'] as $gsp) {
                ?>
                    <tr> 
                        <td><?php echo $i?></td> 
                        <td style="width:40px;height:40px"><img style="width: 100px;height:auto;" src="<?php 
                            foreach ($data['ctsanpham_list'] as $ctsp) {
                                if($ctsp->getMact() == $gsp->getMact()){
                                    echo "./public/".$ctsp->getHinhanh();
                                }
                            }
                            ?>" alt="<?php 
                            foreach ($data['ctsanpham_list'] as $ctsp) {
                                if($ctsp->getMact() == $gsp->getMact()){
                                    echo $ctsp->getHinhanh();
                                }
                            }
                            ?>">
                        </td>
                        <td><?php echo $gsp->getMach();?></td>
                        <td>
                            <?php 
                            foreach ($data['ctsanpham_list'] as $ctsp) {
                                if($ctsp->getMact() == $gsp->getMact()){
                                    foreach ($data['sanpham_list'] as $sp) {
                                        if($sp->getMasp() == $ctsp->getMasp()){
                                            echo $sp->getTensp();
                                            $tensp = $sp->getTensp();
                                            $trangthai = $sp->getTrangThai();
                                            $masp = $sp->getMasp();

                                            if (!in_array($sp->getTensp(), $list_ten)) {
                                                array_push($list_ten, $sp->getTensp());
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            foreach ($data['ctsanpham_list'] as $ctsp) {
                                if($ctsp->getMact() == $gsp->getMact()){
                                    echo $ctsp->getMau();
                                    $mau = $ctsp->getMau();
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $gsp->getCauhinh();?></td>
                        <td><?php echo $gsp->getDongia();?></td>
                        <td>
                            <?php 
                            foreach ($data['ctsanpham_list'] as $ctsp) {
                                if($ctsp->getMact() == $gsp->getMact()){
                                    foreach ($data['sanpham_list'] as $sp) {
                                        if($sp->getMasp() == $ctsp->getMasp()){
                                            echo $sp->getBaohanh();
                                            $baohanh = $sp->getBaohanh();
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $gsp->getSoluong();?></td>
                        <td style="display:flex;height:100%">
                            <div class="icon-option" name ="xemchitiet" style="background-color: rgb(93, 184, 93);" id="icon-edit" value="<?php echo $gsp->getMach();?>" onclick="moveEdit('modal-edit-product','<?php echo $gsp->getMach();?>','<?php echo $tensp ?>','<?php echo $baohanh?>','<?php echo $trangthai?>','<?php echo $mau?>','<?php echo $gsp->getCauhinh();?>','<?php echo $gsp->getDongia();?>','<?php echo $masp?>','<?php echo $hinhanh?>')">
                                <i class="fas fa-edit"></i>
                            </div> 
                            <div type ="submit" class="icon-option" style="background-color: rgb(255, 80, 80);" id="icon-delete" name="id-dele" value="<?php echo $gsp->getMach();?>" onclick="xacnhanDelete('xacnhan-delete','<?php echo $gsp->getMach();?>','id-dele')" >
                            <i class="fas fa-trash-alt"></i>
                            <input style="display:none;" type="text" name="id-dele" value="">
                            </div>
                        </td>
                        
                    </tr>
                <?php 
                $i++;
                }
                $tens = json_encode($list_ten);
                ?>
            </tbody> 
        </table>

        <div class="xacnhan-delete" id="xacnhan-delete">
        <div class="text-xacnhan" id="text-xacnhan" >Xác nhận xóa san pham <span id="id-dele"></span> ?</div>
            <button type="submit" class="bnt-select" id="btn-delete" name="delete">OK</button>
            <div class="bnt-select" id="btn-back" onclick="exitXacnhan('xacnhan-delete')">Không</div>
        </div>

        <div class="modal-add" id="modal-add-product">
            <div style="height:400px" class="view-info">
                <div class="exit-view-info" onclick="exitAdd('modal-add-product')">X</div>
                <div class="info">
                    <div style="width:50%" class="text-info">
                        <ul>
                            <li>Loại</li>
                            <li>Mã SP</li>
                            <li>Tên SP</li>
                            <li>Bảo hành</li>
                            <li>Trạng thái</li>
                            <li>Mã KM</li>
                        </ul>
                    </div>
                    <div style="left: 40%; width:50%" class="input-info">
                        <ul>
                            <li >
                                <input type="text" id="id-pro-input" name="id-pro-input" class="li"  placeholder="Nhập mã" value="<?php echo $data['newid'];?>" readonly>
                                <div class="error" style="margin-left:10px" id="error-ma-tk"> </div>
                            </li>
                            <li >
                                <input type="text" id="user-pro-input" name="user-pro-input" class="li"  placeholder="Nhập tài khoản" value="">
                                <div class="error" style="margin-left:10px" id="error-user-tk" ></div>
                            </li>
                            <li >
                                <input type="text" id="pass-pro-input" name="pass-pro-input" class="li"  placeholder="Nhập mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass-tk"></div>                                    
                            </li>
                            <li >
                                <input type="text" id="pass2-pro-input" name="pass2-pro-input" class="li"  placeholder="Nhập lại mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass2-tk" ></div>                                                                      
                            </li>
                            <li>
                                <div class="li">
                                <select style="font-weight: 550;width:100px;height:25px" id="trangthai-acc-edit" name="trangthai-acc-edit">
                                    <option style="width:800px"  class ="text-search" value="1">On(1)</option>
                                    <option style="width:50px"  class ="text-search" value="0">Off(0)</option>
                                </select>
                                </div>
                                <div class="error" id="error-quyen-tk" style="margin-left:10px"></div>   
                            </li>
                            <li >
                                <input type="text" id="pass2-pro-input" name="pass2-pro-input" class="li"  placeholder="Nhập lại mật khẩu" value="">
                                <div class="error" style="margin-left:10px" id="error-pass2-tk" ></div>                                                                      
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

        <div class="modal-edit" id="modal-edit-product">
            <div  class="view-info-product">
                <div class="exit-view-info" onclick="exitAdd('modal-edit-product')">X</div>
                <div class="info-img-product">
                    <img class="img-product" id="img-product" src="" alt="">
                    <input type="file" class="img-pro-edit">
                </div>
                <div style="height:450px;" class="info-product">
                    <div class="text-info">
                        <ul>
                            <li>ID </li>
                            <li>Sản Phẩm </li>
                            <li>Bảo hành</li>
                            <li>Trạng thái</li>
                            <li id="mau-li">Màu sắc</li>
                            <li id="cauhinh-li">Phiên bản</li>
                            <li id="cauhinh-li">Giá bán</li>
                        </ul>
                    </div>
                    <div style="height:100%;width:105%;left:25%" class="input-info">
                        <ul class="input">
                            <li >
                                <input type="text" id="idloai-pro-edit" name="idloai-pro-edit" class="li"  placeholder="Nhập mã" value="" readonly>
                                <div class="error" id="error-idloai-sp-edit"></div>
                            </li>
                            <li >
                                <input style="display:none" type="text" id="idsp-pro-edit" name="idsp-pro-edit" class="li"  placeholder="Nhập mã" value="" readonly>
                                <div class="error" id="error-idloai-sp-edit"></div>
                            </li>
                            <li >
                                <input type="text" id="tensp-pro-edit" name="tensp-pro-edit" class="li"  placeholder="Nhập mã email" value="" >
                                <div class="error" id="error-tensp-sp-edit"></div>
                                <span id="ten-current"></span>                                    
                            </li>
                            <li >
                                <input type="text" id="baohanh-pro-edit" name="baohanh-pro-edit" class="li"  placeholder="Nhập số điện thoại" value="">
                                <div class="error" id="error-baohanh-sp-edit"></div>                              
                            </li>
                            <li>
                                <div class="li">
                                <select style="font-weight: 550;width:100px;height:25px" id="trangthai-pro-edit" name="trangthai-pro-edit">
                                    <option style="width:800px"  class ="text-search" value="1">1</option>
                                    <option style="width:50px"  class ="text-search" value="0">0</option>
                                </select>
                                </div>
                                <div class="error" id="error-trangthai-sp-edit" style="margin-left:10px"></div>   
                            </li>
                            <li >
                                <input type="text" id="mau-pro-edit" name="mau-pro-edit" class="li"  placeholder="Nhập mã tài khoản" value="" readonly></span>
                                <div class="error" id="error-mau-sp-edit"></div>                                    
                            </li>
                            <li >
                                <input type="text" id="cauhinh-pro-edit" name="cauhinh-pro-edit" class="li"  placeholder="Nhập mã tài khoản" value="" readonly></span>
                                <div class="error" id="error-cauhinh-sp-edit"></div>                                    
                            </li>
                            <li >
                                <input type="text" id="gia-pro-edit" name="gia-pro-edit" class="li"  placeholder="Nhập mã tài khoản" value=""></span>
                                <div class="error" id="error-gia-sp-edit"></div>                                    
                            </li>
                        </ul>
                    </div>
                <span style="display:none" id='span-tens'><?php echo $tens?></span>
                <div style="bottom:50px;left:100px" class="btn-xacnhan" onclick="xacNhanEdit('sanpham')">Cập nhật</div>
                </div>
            </div>
            <div style="width:350px;top:200px" class="view-xacnhan" id="edit-xacnhan-pro">
                <div class="text-xacnhan">Xác nhận cập nhật sản phẩm <span id="id-edit-pro"></span> ?</div>
                <button class="bnt-select" id="btn-edit" name="edit-pro">OK</button>
                <div class="bnt-select" id="btn-back" onclick="exitXacnhan('edit-xacnhan-pro')">Không</div>
            </div>
        </div>
    </form>
</div>
