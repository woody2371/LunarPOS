<h2><?= esc($title) ?></h2>


<table class="posPanel">
    <tr>
        <td><button type="button" class="posProduct">Juggling Clubs</button></td>
        <td><button type="button" class="posProduct">Weekend Ticket</button></td>
        <td><button type="button" class="posProduct">Child Ticket</button></td>
        <td><button type="button" class="posProduct">Breakfast </button></td>
    </tr>
    <tr>
        <td><button type="button" class="posProduct">Eggs on Toast</button></td>
        <td><button type="button" class="posProduct">Curry</button></td>
        <td><button type="button" class="posProduct">Brownie</button></td>
        <td><button type="button" class="posProduct">Diabolo String</button></td>
    </tr>
    <tr>
        <td><button type="button" class="posProduct">Beer Pint</button></td>
        <td><button type="button" class="posProduct">Beer Middy</button></td>
        <td><button type="button" class="posProduct">Wine Glass</button></td>
        <td><button type="button" class="posProduct">Wine Bottle</button></td>
    </tr>
</table>

<?php if (! empty($products) && is_array($products)): ?>

    <?php foreach ($products as $product_item): ?>

        <h3><?= esc($product_item['description']) ?></h3>

        <div class="main">
            <?= esc($product_item['price']) ?>
        </div>
        <!--<p><a href="/products/<?= esc($product_item['category'], 'url') ?>">View article</a></p>-->

    <?php endforeach ?> 

<?php else: ?>

    <h3>No products</h3>

    <p>Unable to find any products for you.</p>

<?php endif ?>

