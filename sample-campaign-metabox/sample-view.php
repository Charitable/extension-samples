<?php 
/**
 * Renders the sample field for the Campaign post type.
 *
 * @author  Studio 164a
 * @since   1.0.0
 */

global $post;

$value = get_post_meta( $post->ID, '_sample_metabox', true );

?>
<input type="text" name="_sample_metabox" id="sample_metabox" value="<?php echo $value ?>" />