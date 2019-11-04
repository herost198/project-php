<?php include_once 'views/layout/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="index.php?controller=product&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>

        <h2>Danh sách sản phẩm</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Danh mục</th>
                <th>Tên sản phẩm</th>
                <th>Gía</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                  <tr>
                      <td>
                        <?php echo $product['id']; ?>
                      </td>
                      <td>
                        <?php echo $product['category_name']; ?>
                      </td>
                      <td>
                        <?php echo $product['name']; ?>
                      </td>
                      <td>
                          <?php echo number_format($product['price']); ?>VNĐ
                      </td>
                      <td>
                        <?php if (!empty($product['image'])): ?>
                            <img src="assets/uploads/<?php echo $product['image'] ?>"
                                 width="80px"/>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php echo $product['status'] == '1' ?   "Actived" : "Disabled" ; ?>
                      </td>
                      
                      <td>
                        <?php
                        $urlDetail = 'index.php?controller=product&action=detail&id=' . $product['id'];
                        $urlUpdate = 'index.php?controller=product&action=update&id=' . $product['id'];
                        $urlDelete = 'index.php?controller=product&action=delete&id=' . $product['id'];
                        ?>
                          <a href="<?php echo $urlDetail ?>">
                              <span class="fa fa-eye"></span>
                          </a> &nbsp;
                          <a href="<?php echo $urlUpdate ?>">
                              <span class="fa fa-pencil"></span>
                          </a> &nbsp;
                          <a href="<?php echo $urlDelete ?>"
                             onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này hay không?');">
                              <span class="fa fa-trash"></span>
                          </a> &nbsp;
                      </td>
                  </tr>
            <?php endforeach; ?>
          <?php else: ?>
              <tr>
                  <td colspan="7">
                      Không có bản ghi nào
                  </td>
              </tr>
          <?php endif; ?>
        </table>
      
    </section>
   
</div>

<?php include_once 'views/layout/footer.php' ?>
