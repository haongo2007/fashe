<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <hr style="margin-top: 0;margin-bottom: 10px">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo public_url('admin/LTE/dist/img/') ?><?php echo $admin->avatar; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin->name; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <hr style="margin: 10px 0px">
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?php echo admin_url('home') ?>">
            <i class="fa fa-dashboard"></i> <span>Bảng Điều Khiển</span>
          </a>
        </li>

        <li <?php if ($this->uri->rsegment(1) == 'transaction')  {echo "class='active'";}?> >
          <a href="<?php echo admin_url('transaction') ?>"><i class="fa fa-credit-card"></i><span>Giao Dịch</span></a>
        </li>

        <li <?php if ($this->uri->rsegment(1) == 'catalog' )  {
          echo "class='active'";
        } ?> >

          <a href="<?php echo admin_url('catalog') ?>">
            <i class="fa fa-calculator"></i> <span>Danh Mục</span>
          </a>
        </li>

        <li <?php if ($this->uri->rsegment(1) == 'brand' )  {
          echo "class='active'";
        } ?> >

          <a href="<?php echo admin_url('brand') ?>">
            <i class="fa fa-id-card-o"></i> <span>Thương Hiệu</span>
          </a>
        </li>

        <li <?php if ($this->uri->rsegment(1) == 'product' )  {
          echo "class='active'";
        } ?> >

          <a href="<?php echo admin_url('product') ?>">
            <i class="fa fa-product-hunt"></i> <span>Sản Phẩm</span>
          </a>
        </li>
        <li <?php if ($this->uri->rsegment(1) == 'page' )  {
          echo "class='active'";
        } ?> >

          <a href="<?php echo admin_url('page') ?>">
            <i class="fa fa-file-text-o"></i> <span>Trang Tĩnh</span>
          </a>
        </li>
        <li <?php if ($this->uri->rsegment(1) == 'direct' )  {
          echo "class='active'";
        } ?> >

          <a href="<?php echo admin_url('direct') ?>">
            <i class="fa fa-paper-plane-o"></i> <span>Trực Tuyến</span>
          </a>
        </li>
        <li <?php if ($this->uri->rsegment(1) == 'shippingfee' )  {
          echo "class='active'";
        } ?>>
          <a href="<?php echo admin_url('shippingfee') ?>"><i class="fa fa-truck"></i> <span>Phí Vận Chuyển</span></a>
        </li>

        <li 

        <?php if ($this->uri->rsegment(1) == 'admin')  {
          echo "class='active treeview'";
        }elseif ($this->uri->rsegment(1) == 'user') {
          echo "class='active treeview'";
        }elseif ($this->uri->rsegment(1) == 'ctv') {
          echo "class='active treeview'";
        }
        else{ echo "class='treeview'";} ?>>

          <a href="#">
            <i class="fa fa-users"></i> <span>Quản Trị</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo admin_url('admin') ?>"><i class="fa fa-circle-o"></i>Ban Quản Trị</a></li>
            <li><a href="<?php echo admin_url('ctv') ?>"><i class="fa fa-circle-o"></i>CTV</a></li>
            <li><a href="<?php echo admin_url('user') ?>"><i class="fa fa-circle-o"></i>Thành Viên</a></li>
          </ul>
        </li>

        <li

          <?php if ($this->uri->rsegment(1) == 'contact')  {
          echo "class='active treeview'";
          }elseif ($this->uri->rsegment(1) == 'menu') {
            echo "class='active treeview'";
          }elseif ($this->uri->rsegment(1) == 'news') {
            echo "class='active treeview'";
          }elseif ($this->uri->rsegment(1) == 'slide') {
            echo "class='active treeview'";
          }elseif ($this->uri->rsegment(1) == 'hotdeal') {
            echo "class='active treeview'";
          }
          else{ echo "class='treeview'";} ?>>

          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Nội Dung</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-commenting-o"></i>Xem Comment</a></li>
            <li><a href="<?php echo admin_url('news') ?>"><i class="fa fa-newspaper-o"></i>Tin Tức</a></li>
            <li><a href="<?php echo admin_url('slide') ?>"><i class="fa fa-picture-o"></i>Slide</a></li>
            <li><a href="<?php echo admin_url('menu') ?>"><i class="fa fa-book"></i>Menu</a></li>
            <li><a href="<?php echo admin_url('contact') ?>"><i class="fa fa-phone"></i>Liên Hệ</a></li>
            <li><a href="<?php echo admin_url('hotdeal') ?>"><i class="fa fa-money"></i>Hot Deal</a></li>
          </ul>
        </li>
     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>