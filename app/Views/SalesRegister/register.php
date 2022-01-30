<?php $i=1; ?>
<?php if (! empty($products) && is_array($products)): ?>
    <table>

    <?php foreach ($products as $product_item): ?>
        <?php if ($i==0): ?>
        <tr>
        <?php endif ?>
        <td><button type="button" price="<?= esc($product_item['price']) ?>" class="btn btn-primary posProduct btn<?= esc($product_item['category']) ?>"><?= esc($product_item['description']) ?></button></td>
        <?php if ($i==4): $i=0; ?>
        </tr>
        <?php endif ?>
        <?php $i++; ?>
    <?php endforeach ?> 

<?php else: ?>

    <h3>No products</h3>

    <p>Unable to find any products for you.</p>

</table>

<?php endif ?>

