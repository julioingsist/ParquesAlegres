		</div>
		<div class="sidebar">
		<ul>
				<?php
				if (!dynamic_sidebar('sidebar-widget-area') ) : ?>
				<li>
					<h2><?php _e( 'Search', 'naturefox' ); ?></h2>
					<?php get_search_form(); ?>
				</li>
				<li>
					<h2><?php _e( 'Pages', 'naturefox' ); ?></h2>
					<ul>
					    <?php wp_list_pages('title_li='); ?>
					</ul>
				</li>
				<li>
					<h2><?php _e( 'Categories', 'naturefox' ); ?></h2>
					<ul>
					    <?php wp_list_categories('title_li='); ?>
					</ul>				
				</li>
				<li>
					<h2><?php _e( 'Archives', 'naturefox' ); ?></h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
				<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<li>
					<h2><?php _e( 'Meta', 'naturefox' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
				<?php } ?>

				<?php endif; ?>
		</ul>					
		</div>
	</div>
</div>
