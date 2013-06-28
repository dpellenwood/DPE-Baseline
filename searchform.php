<?php
/**
 * The template for displaying the search form
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-append">
			<label for="s" class="assistive-text"><?php _e( 'Search', 'dpe-baseline' ); ?></label>
			<input type="text" class="oversized input-text field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'dpe-baseline' ); ?>" />
			<button type="submit" class="submit small button btn" name="submit" id="searchsubmit"><?php esc_attr_e( 'Search', 'dpe-baseline' ); ?></button>
		</div>
	</form>