<?php
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object( $post );

if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

$is_featured_image = OhioOptions::get( 'project_add_featured_on_page', true );

if ( !$is_featured_image ) {
	if ( $project['featured_image'] ) {
		array_shift( $project['images'] );
	}
}

$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'project_video_button_size', 'default' );
$video_cover = OhioOptions::get( 'project_video_cover', false );
$video_cover_fit = OhioOptions::get( 'project_video_cover_fit', true );

# Header previous button
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

# Slider options
$navBtn = OhioOptions::get( 'project_nav_visibility' );
$loop = OhioOptions::get( 'project_loop_mode' );
$autoplay = OhioOptions::get( 'project_autoplay_mode' );
$autoplayTimeout = OhioOptions::get( 'project_autoplay_interval', '', NULL, true );
$pagination = OhioOptions::get( 'project_bullets_visibility', true );

$slider_pagination_data = '';
if ( $pagination ) {
    $slider_pagination_type = OhioOptions::get( 'project_bullets_type');
    if ( $slider_pagination_type == 'bullets' ) {
        $slider_pagination_data = 'data-slider-dots="true"';
    } else if ( $slider_pagination_type == 'pagination' ) {
        $slider_pagination_data = 'data-slider-pagination="true"';
    }
}

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$image_scroll_effect = OhioOptions::get( 'project_gallery_scrolling_effect', true );

$page_container_class = '';
$custom_page_container_class = '';
$paralax_bg_attr = '';
if ( !$show_breadcrumbs && $add_content_padding ) {
    $page_container_class .= ' top-offset';
}
if ( !$page_wrapped ) {
    $page_container_class .= ' -full-w';
    $custom_page_container_class .= ' -full-w';
}
if ( $add_content_padding ) {
    $page_container_class .= ' bottom-offset';
}

if ( $show_breadcrumbs ) {
    get_template_part( 'parts/elements/breadcrumbs');
}

if ( $image_scroll_effect == 'scale' ) {
    $page_container_class .= ' scroll-scale-image';
    $paralax_bg_attr = 'class=scale-bg';
} else if ( $image_scroll_effect == 'parallax' ) {
    $paralax_bg_attr = 'class=parallax data-parallax-bg=vertical data-parallax-speed=.5';
}

$is_slider = count( $project['images'] ) > 1 || ( count( $project['images'] ) && $video_cover );

wp_reset_query();
?>

<?php if ( $project['custom_content_position'] == 'top' ) : ?>
    <div class="page-container <?php echo esc_attr( $custom_page_container_class ); ?>">
        <div class="project-custom">
            <?php 
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<div class="project-page project -layout6<?php echo esc_attr( $page_container_class ); ?>">
    <div class="project-gallery -with-slider">
        <div class="project-slider -slider-fs<?php if ( ! $is_slider ) { echo esc_attr( ' -single' ); } ?>" <?php echo $is_slider ? 'data-portfolio-grid-slider' : '' ?> data-slider-navigation="<?php echo esc_attr( $navBtn ); ?>" data-slider-loop="<?php echo esc_attr( $loop ); ?>" data-slider-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-slider-autoplay-time="<?php echo esc_attr( $autoplayTimeout ); ?>" <?php echo esc_attr( $slider_pagination_data ); ?>>
            <?php if ( $video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                <div <?php echo esc_attr( $paralax_bg_attr ); ?>>
                    <div class="video-holder <?php echo esc_attr( $image_scroll_effect == 'parallax' ? 'parallax-bg' : '' ); ?><?php if ( $video_cover_fit ) { echo esc_attr( ' -cover' ); } ?>">
                        <iframe src="<?php echo esc_url( $project['video']['link'] ); ?>" frameborder="0"/></iframe>
                        <div class="overlay"></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( is_array( $project['images'] ) ) : ?>
                <?php foreach ( $project['images'] as $art ) : ?>
                    <div <?php echo esc_attr( $paralax_bg_attr ); ?>>
                        <div class="project-image <?php echo esc_attr( $image_scroll_effect == 'parallax' ? 'parallax-bg' : '' ); ?>"
                            style="background-image: url( '<?php echo esc_url( $art['url'] ); ?>' )"
                            alt="<?php echo esc_attr( $art['alt'] ); ?>">
                            <div class="overlay"></div>
                        </div> 
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
    <div class="project-content -with-slider">
        <div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
            <div class="vc_row">
                <div class="vc_col-md-7">
                    <div class="holder animated-holder">
                        <?php if ( !$video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                            <div class="video-button -animation open-popup<?php if ( $video_button_style != 'default' ) { echo ' -' . $video_button_style . ''; } ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                                <button aria-label="Play the video" class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>">
                                    <i class="icon">
                                        <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                                    </i>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php 
                            OhioHelper::set_storage_item_data( $project ); 
                            get_template_part( 'parts/portfolio/components/headline' ); 
                        ?>
                        <div class="project-details">
                            <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>

                            <?php 
                                if ( $project['custom_content_position'] == 'after_description' ) {
                                    the_content();
                                }
                            ?>
                        </div>
                        <?php 
                            OhioHelper::set_storage_item_data( $project ); 
                            get_template_part( 'parts/portfolio/components/options_group' ); 
                        ?>
                        <?php if ( !empty( $project['link'] ) ) : ?>
                            <a class="button -text -unlink" target="_blank" href="<?php echo esc_url( $project['link'] ); ?>">
                                <?php esc_html_e( 'Open Project', 'ohio' ); ?>
                                <i class="icon -right">
                                    <svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
                                </i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>
                <div class="share-bar">
                    <div class="social-networks -small">
                        <?php printf( '%s', $project['sharing_links_html'] ); ?>
                    </div>  
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if ( $project['custom_content_position'] == 'bottom' ) : ?>
    <div class="page-container <?php echo esc_attr( $custom_page_container_class ); ?>">
        <div class="project-custom">
            <?php 
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( $previous_btn ) : ?>
    <?php get_template_part( 'parts/elements/back_link' ); ?>
<?php endif; ?>

<?php if ( $project['show_navigation'] ) {
    get_template_part( 'parts/elements/nav_projects' );
}?>