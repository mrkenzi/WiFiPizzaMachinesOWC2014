<?php
/*
 Template Name: Home Page Template
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>
<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
					<div id="main" class="m-all cf" role="main">
						<!--Main page content -->
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<header class="article-header">
								</header>
								<section class="entry-content cf" itemprop="articleBody">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section>
								<footer class="article-footer">
									<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
								</footer>
							</article>
							<?php endwhile; else : ?>
									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
						<?php endif; ?>
						</div>

						<!-- Activities/Events -->
						<h2>CCARE Events and News</h2>
						<!-- do stuff to display 2 events and 1 blog post -->
						<div id="events-main">
							<?php
								$args = array( 'posts_per_page' => 2,'post_type' => 'event', 'order'=> 'ASC', 'orderby' => 'post_date' );
								$postslist = get_posts( $args );
								foreach ( $postslist as $post ) :
								 setup_postdata( $post ); ?>
									<div id="event-thumb">
										<?php if ( has_post_thumbnail() ) { ?> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(270,270) ); ?></a> <?php } ?>
										<div class="event_thumb_holder">&nbsp;</div>
										<strong><?php the_title(); ?></strong>
										<div class="event_thumb_text_holder">&nbsp;</div>
										<?php the_excerpt(); ?>
										<?php ?>
									</div>
								<?php
								endforeach;
								wp_reset_postdata();
								?>
							<?php
								$category_featured = get_cat_ID( 'Featured' );
								$args = array( 'posts_per_page' => 1,'post_type' => 'post', 'category' => $category_featured, 'order'=> 'ASC', 'orderby' => 'post_date' );
								$postslist = get_posts( $args );
								foreach ( $postslist as $post ) :
								 setup_postdata( $post ); ?>
									<div id="event-thumb">
										<?php if ( has_post_thumbnail() ) { ?> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(270,270) ); ?></a> <?php } ?>
										<div class="event_thumb_holder">&nbsp;</div>
										<strong><?php the_title(); ?></strong>
										<div class="event_thumb_text_holder">&nbsp;</div>
										<?php the_excerpt(); ?>
										<?php ?>
									</div>
								<?php
								endforeach;
								wp_reset_postdata();
							?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
