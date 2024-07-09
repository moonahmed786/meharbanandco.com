<?php
	$project = OhioObjectParser::parse_to_project_object( $post );

	if ( !$project['next'] ) return;
?>

<div class="sticky-nav">
	<div class="sticky-nav-thumbnail -fade-up"
		<?php if ( $project['next']['image']):
			echo 'style="background-image: url(\'' . $project['next']['image'] . '\');"';
		endif; ?>
		>
	</div>
	<div class="sticky-nav-holder">
		<div class="sticky-nav-headline">
			<h6 class="title">
				<?php esc_html_e( 'Next Project', 'ohio' ); ?>
			</h6>
			<div class="nav-group">
				<a class="icon-button prev" href="<?php echo esc_url( $project['prev']['url'] ); ?>">
				    <i class="icon">
				    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8,16l1.4-1.4L3.8,9H16V7H3.8l5.6-5.6L8,0L0,8L8,16z"/></svg>
				    </i>
				</a>
				<a class="icon-button next" href="<?php echo esc_url( $project['next']['url'] ); ?>">
				    <i class="icon">
				    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
				    </i>
				</a>
			</div>
		</div>
		<a class="titles-typo -undash" href="<?php echo esc_url( $project['next']['url'] ); ?>">
			<?php echo wp_kses( $project['next']['title'], 'default' ); ?>
		</a>
	</div>
</div>
