<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( 'Page Not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'We\'re sorry, the page you were looking for was not found. You can search here for more information:', 'bonestheme' ); ?></p>

							</section>

							<section class="search_404">

									<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer">

							</footer>

						</article>

					</div>

				</div>

			</div>

<?php get_footer(); ?>
