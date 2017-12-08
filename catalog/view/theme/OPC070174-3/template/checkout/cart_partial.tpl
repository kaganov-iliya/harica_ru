<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h1 class="modal-title">Товар добавлен в корзину</h1>
</div>
<div class="modal-body">
    <table class="table">
        <?php foreach ($products as $product): ?>
        <tr>
            <td><img src="<?php echo $product['thumb'] ?>" alt="<?php echo $product['name'] ?>" class="img-thumbnail"></td>
            <td><h3><a href="<?php echo $product['href'] ?>"><?php echo $product['name'] ?></a></h3></td>
            <td><span class="badge">x <?php echo $product['quantity'] ?></span></td>
            <td><strong><?php echo $product['price'] ?></strong></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="modal-footer">
    <a href="<?php echo $checkout_link; ?>" class="btn btn-default">Оформить заказ</a>
</div>