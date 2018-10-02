
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div id="wrap">
	<div class="g_content">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-3  content_left">
					<?php 
					$arg_big_post_query = array(
						'posts_per_page' => 1,
						'cat' => 17,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish'
					);
					$big_post_query = new WP_Query();
					$big_post_query->query($arg_big_post_query);
					?>
					<div class="hot_big_post_area">
						<div class="row">
							<div class="col-md-9">
								<?php if(have_posts()) : 
									while($big_post_query->have_posts()) : $big_post_query->the_post();
										?>
										<div class="hot_big_post">
											<figure class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a> </figure>
											<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
											<div class="excerpt">
												<p><?php echo excerpt(25); ?></p>
											</div>
										</div>

										<?php  
									endwhile;
								else:
								endif;
								?>
							</div>
							<div class="col-md-3">
								<div class="list_hot_post_others">
									<?php 
									$arg_fpost_query = array(
										'order' => 'DESC',
										'cat' => 17,
										'posts_per_page'=>4,
										'offset'=>1
									);
									$exclude_fpost_query = new WP_Query();
									$exclude_fpost_query->query($arg_fpost_query);
									?>
									<?php 
									if(have_posts()) : 
										while($exclude_fpost_query->have_posts()) : $exclude_fpost_query->the_post();
											?>
											<div class="item_list_hot">
												<figure class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a> </figure>
												<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
											</div>

											<?php  
										endwhile;
									else:
									endif;
									?>
								</div>
							</div>
						</div>
					</div>


					<div class="list_post_content">
						<?php 
						$argsQuery = array(
							'posts_per_page'   => 10,
							'category__not_in' => 17
						);
						$wp_query = new WP_Query(); $wp_query->query($argsQuery);
						if(have_posts()): 


							while($wp_query->have_posts()) : $wp_query->the_post(); 

								get_template_part('content');		

							endwhile;
						else:
						endif;
						?>

						<?php wp_reset_postdata();?>
					</div>

				</div>

				<div class="col-md-3 col-sm-3 sidebar">
					<?php dynamic_sidebar('sidebar1'); ?> 
				</div>
			</div>
		</div>
	</div>

</div>


<?php get_footer(); ?>




