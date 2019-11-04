<?php include_once 'views/layout/header.php' ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Sản phẩm

        </h1>

    </section>

    <section class="content">
        <h2>Thêm mới sản phẩm</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label>Thể loại sản phẩm</label>
                <select class="form-control" name="category_id">
                    <?php if (!empty($categories)) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['Id'] ?>" <?php echo isset($_POST['category_id']) && $category['Id'] == $_POST['category_id'] ? "selected=true" : null ?>>
                                <?php echo $category['Name'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh sản phẩm
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input type="number" name="stock" value="<?php echo isset($_POST['stock']) ? $_POST['price'] : 0; ?>" class="form-control" />
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : 0; ?>" class="form-control" />
            </div>


            <div class="form-group">

                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option <?php echo isset($_POST['status']) && $_POST['status'] == '1' ? "selected" : "" ?> value="1">
                        Enabled
                    </option>
                    <option <?php echo isset($_POST['status']) && $_POST['status'] == '0' ? "selected" : "" ?> value="0">
                        Disabled
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Save" />
                <a href="index.php?controller=product&action=index" class="btn btn-secondary">Back</a>
            </div>
        </form>
</div>
</section>
</div>
<?php include_once 'views/layout/footer.php' ?>