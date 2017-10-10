<br>
<?php if ( isset( $_SESSION['status'])): ?>
    <?= $_SESSION['status']; unset($_SESSION['status']) ?>
<?php endif; ?>
<form method="post" action="addProduct" name="form" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" class="form-control" value="<?php if(isset($product_view['id'])){ echo htmlspecialchars( $product_view['id']);}?>"/>
    <div class="form-group">
        <label for="product">Название Товара: </label>
        <input type="text" name="product" id="product" class="form-control" placeholder="Название товара" required autofocus maxlength="255" value="<?php if(isset($product_view['id'])){ echo htmlspecialchars($product_view['product']);}?>"/>
    </div>

    <div class="form-group">
        <label for="description">Описание Товара:</label>
        <textarea name="description" id="description" class="form-control" placeholder="Описание товара" required maxlength="100000" style="height: 30em;"><?php if(isset($product_view['id'])){ echo htmlspecialchars($product_view['description']);}?></textarea>
    </div>

    <div class="form-group" style="width: 30%;">
        <input type="file" name="file" id="file" class="form-control"/>
    </div>

    <div class="form-group">
        <!--<button name="save" class="btn-primary">Сохранить</button>-->
        <input type="submit" name="submit" class="btn btn-primary" value = "Create Product"/>
    </div>
</form>
<div class="test"></div>
<script type="text/javascript">
$(function () {
$("form").submit(function(){
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: 'addProduct',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            alert("Thank You!");
            location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});
});
</script>