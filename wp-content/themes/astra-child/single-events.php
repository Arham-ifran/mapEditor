<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header(); ?>
	<div id="primary" class="event-single-page">
  
        <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="main-post-div">
                    
                    <?php 
                    global $post;
                    global $wpdb;
                    $admin_wie_gpx =  $wpdb->prefix.'admin_wie_gpx';
                    $event_link  =  get_post_meta( $post->ID, 'event_link', true );
                    $custom_map  =  get_post_meta( $post->ID, 'custom_map', true );
                    $event_custom_map = json_decode($custom_map);
                    $where_in = " WHERE id IN (" . implode(',', $event_custom_map) . ")";                            
                    $custom_maps = $wpdb->get_results("SELECT * FROM $admin_wie_gpx ".$where_in."  ORDER BY id DESC", ARRAY_A);
                 
                    ?>
                    <div>
                    <div class="single-event-img">
                        <?php  if( has_post_thumbnail() ) {
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
                        echo '<img src="'.$src[0].'" style="max-width: 25rem;">';
                        } else { ?>
                            <img src="<?php echo get_site_url().'/wp-content/uploads/gpx-files/default.jpg'; ?>" style="max-width: 25rem;">
                        <?php } ?>
                    </div>
                    </div>
                    <div class="personalise-event-section">
                        <h3>Selecteer je evenement om je print te personaliseren</h3>
                    </div>
                    <div class="map-list">
                        <ul class="events-list events-list-single">
                            <?php foreach($custom_maps as $result) { ?>
                                <li class="events-item">
                                <?php $hex = wgenerate_num(4).'-'.wgenerate_num(2).'-'.wgenerate_num(2).'-'.wgenerate_num(2).'-'.wgenerate_num(6); ?>
                                <a class="sc-kkGfuU sc-kUaPvJ fUgpiK sc-giadOv bZPXxq" target="_blank" href="<?php echo get_site_url().'/aangepaste-kaart/?event-id='.$result['event_id'].'#/'.$hex; ?>">
                                <div>
                                    <figure class="map-event-img">
                                        <?php if(!empty($result['img_name'])) { ?>
                                            <img src="<?php echo get_site_url().'/wp-content/uploads/gpx-files/'.$result['img_name']; ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo get_site_url().'/wp-content/uploads/gpx-files/default.jpg'; ?>">
                                        <?php } ?>
                                    </figure>
                                </div>
                                    <h3> 
                                        <?php if(!empty($result['title'])) { 
                                            echo $result['title']; 
                                        } else {
                                            echo 'No Title'; 
                                        } ?>
                                    </h3>
                                    <p><?php echo date("jS F Y", strtotime($result['created_at'])); ?></p>
                                </a>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="event-desc">
                        <?php the_content(); ?>
                       <a href="<?php echo $event_link; ?>" target="_blank" rel="nofollow noopener noreferrer">Website bezoeken</a>
                    </div>
               
                </div>
            <?php endwhile; ?> 
	</div><!-- #primary -->
<?php get_footer(); ?>