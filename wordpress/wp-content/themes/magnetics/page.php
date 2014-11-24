<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
  <article>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
</section>
<?php global $post; ?>
<?php print_r(get_post_meta($post->ID, 'Page Tabs', true)); ?>
              

<?php echo get_post_meta(get_the_ID(),'_tabs_tabLeft',true); ?>
                            

<?php print_r(get_post_meta(get_the_ID(), 'page_tabs', true)); ?> 
<?php print_r(get_post_meta(get_the_ID(), '_page_tabs', true)); ?> 
<?php print_r(get_post_meta(get_the_ID(), '_page_tabs_tabs_tabLeft', true)); ?> 



<?php /*
   array(
                    'name'          => 'tabLeft',
                    'label'         => 'Overview Text',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                ),
                array(
                    'name'          => 'tabLeftTextArea',
                    'label'         => 'Content',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                )
            ),

            'Right Tab' => array(
                array(
                    'name'          => 'tabRight',
                    'label'         => 'Overview Text',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                ),
                array(
                    'name'          => 'tabRightTextArea',
                    'label'         => 'Content',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                ) 

                




                	<div class="tabs">
                    	<ul class="tab-header">
                       		<?php 
							$i=1;	
							foreach($tabs as $tab) { 
								$sub_heading=get_post_meta($tab->ID,'_sub_heading',true);
							?>	
                            <li <?php if($i==1) { ?>class="active-tab-header" <?php } ?>>
                            	<a href="#" id="tab-<?php echo $tab->ID;?>">
                                    <h5><?php echo $tab->post_title; ?></h5>
                                    <h6><?php if($sub_heading) echo $sub_heading; ?></h6>
                                </a>
                            </li>
                       		<?php $i++; } ?>
                        </ul>
                        <div class="tab-content">
                        	<?php 
							$j=1;	
							foreach($tabs as $tab) { 
								$sub_heading=get_post_meta($tab->ID,'_sub_heading',true);
							?>	
                            <div id="tab-<?php echo $tab->ID;?>" class="tab <?php if($j==1) echo "active-tab-content"?>">
								<?php echo $tab->post_content; ?>
                            </div>
                            <?php $j++; } ?>
                        </div>
                    </div>

                    */ ?>


<?php endwhile; endif; ?>
<?php get_footer(); ?>