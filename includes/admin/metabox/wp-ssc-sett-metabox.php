<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package Swiper Slider and Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = WP_SSC_META_PREFIX; // Metabox prefix

$gallery_imgs 	= get_post_meta( $post->ID, $prefix.'gallery_id', true );
$no_img_cls		= !empty($gallery_imgs) ? 'wp-igsp-hide' : '';
?>

<table class="form-table wp-igsp-post-sett-table">
	<tbody>
		<tr valign="top">
			<th scope="row">
				<label for="wp-igsp-gallery-imgs"><?php _e('Choose Gallery Images', 'swiper-slider-and-carousel'); ?></label>
			</th>
			<td>
				<button type="button" class="button button-secondary wp-igsp-img-uploader" id="wp-igsp-gallery-imgs" data-multiple="true" data-button-text="<?php _e('Add to Gallery', 'swiper-slider-and-carousel'); ?>" data-title="<?php _e('Add Images to Gallery', 'swiper-slider-and-carousel'); ?>"><i class="dashicons dashicons-format-gallery"></i> <?php _e('Gallery Images', 'swiper-slider-and-carousel'); ?></button>
				<button type="button" class="button button-secondary wp-igsp-del-gallery-imgs"><i class="dashicons dashicons-trash"></i> <?php _e('Remove Gallery Images', 'swiper-slider-and-carousel'); ?></button><br/>
				
				<div class="wp-igsp-gallery-imgs-prev wp-igsp-imgs-preview wp-igsp-gallery-imgs-wrp">
					<?php if( !empty($gallery_imgs) ) {
						foreach ($gallery_imgs as $img_key => $img_data) {

							$attachment_url 		= wp_get_attachment_thumb_url( $img_data );
							$attachment_edit_link	= get_edit_post_link( $img_data );
					?>
							<div class="wp-igsp-img-wrp">
								<div class="wp-igsp-img-tools wp-igsp-hide">
									<span class="wp-igsp-tool-icon wp-igsp-edit-img dashicons dashicons-edit" title="<?php _e('Edit Image in Popup', 'swiper-slider-and-carousel'); ?>"></span>
									<a href="<?php echo $attachment_edit_link; ?>" target="_blank" title="<?php _e('Edit Image', 'swiper-slider-and-carousel'); ?>"><span class="wp-igsp-tool-icon wp-igsp-edit-attachment dashicons dashicons-visibility"></span></a>
									<span class="wp-igsp-tool-icon wp-igsp-del-tool wp-igsp-del-img dashicons dashicons-no" title="<?php _e('Remove Image', 'swiper-slider-and-carousel'); ?>"></span>
								</div>
								<img class="wp-igsp-img" src="<?php echo $attachment_url; ?>" alt="" />
								<input type="hidden" class="wp-igsp-attachment-no" name="wp_igsp_img[]" value="<?php echo $img_data; ?>" />
							</div><!-- end .wp-igsp-img-wrp -->
					<?php }
					} ?>
					
					<p class="wp-igsp-img-placeholder <?php echo $no_img_cls; ?>"><?php _e('No Gallery Images', 'swiper-slider-and-carousel'); ?></p>

				</div><!-- end .wp-igsp-imgs-preview -->
				<span class="description"><?php _e('Choose your desired images for gallery. Hold Ctrl key to select multiple images at a time.', 'swiper-slider-and-carousel'); ?></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .wtwp-tstmnl-table -->