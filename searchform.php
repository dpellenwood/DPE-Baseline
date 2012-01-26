<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage DPE_Baseline */
?>
	<form method="get" id="searchform" class="nice" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="oversized input-text field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
		<input type="submit" class="submit small button" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	</form>