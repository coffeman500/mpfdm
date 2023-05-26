<?php
/**
 * Pop-up modal, options defined in ACF options page
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Value defaults
$popupmodalExpires = (get_field('popupmodal_expiration', 'options')) ? strtotime(get_field('popupmodal_expiration', 'options')) : false;
$popupmodalExpired = false;

// Check expiration date
if ($popupmodalExpires === false || strtotime('now') > $popupmodalExpires)
    $popupmodalExpired = true;

// Show modal if our time is not expired
if (!$popupmodalExpired) { 
?>
<div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="popupModalLabel"><?php the_field('popupmodal_title', 'options'); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php the_field('popupmodal_content', 'options'); ?>
            </div>
        </div>
    </div>
</div>

<script>

    jQuery('window').ready(() => {
        if (window.getCookie('popupmodal-shown') === '') {
            const popupModal = new BootstrapModal('#popupModal');
            popupModal.show();
            window.setCookie('popupmodal-shown', 'true', 1);
        }
    });

</script>

<?php 
} ?>