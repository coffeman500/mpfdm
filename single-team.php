<?php
/**
 * The Service custom post type template
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="int-content-wrapper" id="service-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>

			</main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();