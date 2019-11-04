<?php require_once 'views/layout/header.php';  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="index.php?controller=home&action=create">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>
                            <?php echo $category['id']; ?>
                        </td>
                        <td>
                            <?= $category['name']; ?>
                        </td>
                        <td>
                            <?php echo $category['status'] == '1' ?   "Actived" : "Disabled" ; ?>
                        </td>
                        <td>
                            <?php
                            $urlUpdate = 'index.php?controller=home&action=update&id=' . $category['id'];
                            ?>
                           
                            <a href="<?php echo $urlUpdate?>">
                                <span class="fa fa-pencil"></span>
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
    <!-- /.content -->
</div>
<?php require_once 'views/layout/footer.php'; ?>