<?php include_once 'views/layout/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh mục sản phẩm
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" class="form-control" />
            </div>
            <div class="form-group">

                <label>Status</label>
                <select name="status" class="form-control">
                    <option <?php echo isset($_POST['status']) && "1" == $_POST['category_id'] ? "selected" : "" ?> value="1">
                        Enabled
                    </option>
                    <option <?php echo isset($_POST['status']) && "0" == $_POST['category_id'] ? "selected" : "" ?> value="0">
                        Disabled
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Save" />
                <a href="index.php?controller=home&action=index" class="btn btn-secondary">Cancel</a>
            </div>

        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'views/layout/footer.php' ?>