<?php
/*
Template Name: - Generic Two Column
*/
include_once(get_template_directory() . '/inc/MenuController.php');
$menuController = new MenuController();
$menu = $menuController->menuWalk(wp_get_nav_menu_items('Top Menu'));
$masterPad = '';
get_header();
?>

<section>
	<?php while ( have_posts() ) : the_post();?>

		<div class="container px5">

			<div class="mxn3 clearfix">
				<section class="col col-12 lg-col-9 px3 mb5 sm-mb0">
					<?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>
					&nbsp;
				</section>


				<aside class="col col-12 lg-col-3 px3">
					<ul class="list-reset">
						<?php $i=1; ?>
						<?php foreach($menu as $menuitem) : ?>
							<?php if(!empty($menuitem->children)): ?>
								<!-- level 1 -->
								<li class="border-bottom border-white <?php if($i!=1) : ?><?php endif; ?>">
									<a href="<?php echo $menuitem->url; ?>" class="p3 black bold bg-smoke hover-bg-darken-2 block"><?php echo $menuitem->title; ?></a>

									<!-- level 2 -->
									<div class="bg-light-grey">

										<?php foreach($menuitem->children as $child) : ?>

											<!-- SIBLINGS -->
											<?php if($child->menu_id == get_the_ID() && count($child->children) == 0 && count($menuitem->children) > 1): ?>

												<!-- need to finish this JASON -->
												<?php if(get_the_ID() == $child->menu_id) :
													$activeLink =  'pink';
												else:
													$activeLink =  'nope';
												endif;
												?>

												<?php foreach($menuitem->children as $temp): ?>
													<a href="<?php echo $temp->url ?>" class="btn block py2 border-bottom black hover-pink <?php echo $activeLink ?>">
														<?php echo $temp->title; ?>
													</a>
												<?php endforeach; ?>

											<?php endif; ?>

											<?php if(get_the_ID() == $child->post_parent) : ?>

												<!-- level 2 -->
												<a href="<?php echo $child->url ?>" class="p3 black bold bg-smoke hover-bg-darken-2 block">
													<?php echo $child->title; ?>
												</a>

												<!-- level 3 -->
												<div class="bg-grey">
													<?php foreach($child->children as $grandchild) : ?>
														<?php if(get_the_ID() == $grandchild->post_parent) : ?>
															<a href="<?php echo $grandchild->url ?>" class="btn block py2 border-bottom black hover-pink">
																<?php echo $grandchild->title; ?>XX
															</a>
														<?php endif; ?>
													<?php endforeach; ?>
												</div>

											<?php endif; ?>

										<?php endforeach; ?>
									</div>
								<?php else: ?>
									<li class="border-bottom border-white <?php if($i!=1) : ?><?php endif; ?>">
										<a href="<?php echo $menuitem->url; ?>" class="p3 black bold bg-smoke hover-bg-darken-2 block"><?php echo $menuitem->title; ?></a>
									</li>
								<?php endif; ?>
								<?php $i++; ?>
							<?php endforeach; ?>


						</ul>
					</aside>
				</div>
			</div>

		<?php endwhile;?>
	</section>

	<?php get_footer(); ?>
