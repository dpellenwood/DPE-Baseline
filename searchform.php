<?php
/**
 * The template for displaying the search form
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'dpe-baseline' ); ?></label>
		<input type="text" class="oversized input-text field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'dpe-baseline' ); ?>" />
		<input type="submit" class="submit small button" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'dpe-baseline' ); ?>" />
	</form>