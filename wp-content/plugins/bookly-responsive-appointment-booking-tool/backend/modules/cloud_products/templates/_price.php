<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * @var array $product
 */
?>
<div class="mb-3">
    <div class="h5"><?php echo $product['texts']['price'] ?></div>
    <?php if ( isset ( $product['prices'] ) ) : ?>
        <div class="dropdown">
            <button class="bookly-js-product-price-dropdown btn btn-default dropdown-toggle d-flex align-items-center w-100" type="button" data-toggle="dropdown">
                <span class="bookly-js-product-price flex-grow-1">&nbsp;</span>
            </button>
            <div class="dropdown-menu dropdown-menu-compact dropdown-menu-right text-right w-100 shadow">
                <?php foreach ( $product['prices'] as $price ) : ?>
                    <li class="dropdown-item" data-product-price-id="<?php echo $price['id'] ?>">
                        <?php if ( in_array( 'best_offer', $price['tags'] ) ) : ?>
                            <span class="bookly-js-best-offer badge badge-warning"><small><strong><?php esc_html_e( 'best offer', 'bookly' ) ?></strong></small></span>
                        <?php endif ?>
                        <?php if ( in_array( 'users_choice', $price['tags'] ) ) : ?>
                            <span class="bookly-js-users-choice badge badge-danger"><small><strong><?php esc_html_e( 'users choice', 'bookly' ) ?></strong></small></span>
                        <?php endif ?>
                        <span class="text-wrap"><?php echo $price['caption'] ?></span>
                    </li>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>
    <?php if ( isset ( $product['next_billing_date'] ) ) : ?>
        <div class="mt-2"><?php echo isset ( $product['cancel_on_renewal'] ) && ! $product['cancel_on_renewal'] ? esc_html__( 'Next billing date', 'bookly' ) : esc_html__( 'Deactivation date', 'bookly' ) ?>: <?php echo $product['next_billing_date'] ?></div>
    <?php endif ?>
</div>
