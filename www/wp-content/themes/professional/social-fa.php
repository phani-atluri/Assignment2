<?php
/*
** Template to Render Social Icons on Top Bar
*/

for ($i = 1; $i < 8; $i++) : 
	$social = get_theme_mod('professional_social_'.$i);
	if ( ($social != 'none') && ($social != '') ) : ?>
	<a id="<?php echo $social ?>"title="<?php echo ucfirst($social) ?>" href="<?php echo esc_url( get_theme_mod('professional_social_url'.$i) ); ?>"></a>
	<?php endif;

endfor; ?>