<div class="clb-hub clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Dashboard', 'ohio-extra' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-flat"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div id="tabs" class="clb-nav">
			<ul class="clb-nav-inner">
				<li>
					<a href="#tabs-1" class="selected">
						<?php if ( get_option( 'ohio_license_code', false ) ): ?>
							<i class="icon active">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M360-144q-90 0-153-63t-63-153v-240q0-90 63-153t153-63h240q90 0 153 63t63 153v240q0 90-63 153t-153 63H360Zm69-209 204-203-51-51-153 152-68-67-50 51 118 118Zm-69 137h240q60 0 102-42t42-102v-240q0-60-42-102t-102-42H360q-60 0-102 42t-42 102v240q0 60 42 102t102 42Zm120-264Z"/></svg>
							</i>
						<?php else: ?>
							<i class="icon inactive">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M479.79-288q15.21 0 25.71-10.29t10.5-25.5q0-15.21-10.29-25.71t-25.5-10.5q-15.21 0-25.71 10.29t-10.5 25.5q0 15.21 10.29 25.71t25.5 10.5ZM444-432h72v-240h-72v240Zm36.28 336Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>
							</i>
						<?php endif; ?>
						<?php _e( 'Registration', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-2">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-492Zm-.21 396Q450-96 429-117.15T408-168h144q0 30-21.21 51t-51 21ZM732-432v-111H624v-66h108v-111h72v111h108v66H804v111h-72ZM192-216v-72h48v-240q0-87 53.5-153T432-763v-53q0-20 14-34t34-14q20 0 34 14t14 34v53q23 5 44.5 13.5T614-728q-12.81 12.73-23.06 27.73-10.25 15-17.94 32.27-20-13-43.5-20.5T480-696q-70 0-119 49t-49 119v240h336v-108q17 11 34.5 18.5T720-365v77h48v72H192Z"/></svg>
						</i>
						<?php _e( 'What’s New', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-3">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m97-144 245-336h193l281-340v676H97Zm76-225-58-42 155-213h193l168-203 55 46-189 229H306L173-369Zm66 153h505v-404L569-408H378L239-216Zm505 0Z"/></svg>
						</i>
						<?php _e( 'System Status', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-4">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M360-240q-30 0-51-21t-21-51v-48h456v-312h48q30 0 51 21t21 51v504L720-240H360ZM96-288v-504q0-30 21-51t51-21h432q30 0 51 21t21 51v288q0 30-21 51t-51 21H240L96-288Zm504-216v-288H168v288h432Zm-432 0v-288 288Z"/></svg>
						</i>
						<?php _e( 'FAQs', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-5">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>
						</i>
						<?php _e( 'Help Center', 'ohio-extra' ); ?>
					</a>
				</li>
				<li>
					<a class="docs" target="_blank" href="https://docs.clbthemes.com/ohio/">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M168-394h42l22-62h99l22 62h43l-92-244h-44l-92 244Zm77-97 36-102h2l36 102h-74Zm319-87v-76q31-10 64-14.5t68-4.5q23 0 46.5 2.5T792-663v74q-30-7-53-10t-43-3q-34 0-67 6t-65 18Zm0 236v-76q28-9 60-14.5t72-5.5q27 0 50.5 3t45.5 8v74q-30-7-53-10t-43-3q-34 0-67 6t-65 18Zm0-118v-76q32-10 65.5-15t66.5-5q27 0 50.5 3t45.5 8v74q-26-7-49.5-10t-46.5-3q-32 0-64.5 6T564-460ZM264-288q47 0 92 12t88 30v-454q-42-22-87-33t-93-11q-37 0-73.5 6.5T120-716v452q35-13 71-18.5t73-5.5Zm252 42q43-20 88-31t92-11q37 0 73.5 4.5T840-264v-452q-35-13-71-20.5t-73-7.5q-48 0-93 11t-87 33v454Zm-36 102q-49-32-103-52t-113-20q-38 0-76 7.5T115-186q-24 10-45.5-3.5T48-229v-503q0-14 7.5-26T76-776q45-20 92-30t96-10q57 0 111.5 13.5T480-762q51-26 105-40t111-14q49 0 96 10t92 30q13 6 21 18t8 26v503q0 25-15.5 40t-32.5 7q-40-18-82.5-26t-86.5-8q-59 0-113 20t-103 52ZM282-495Z"/></svg>
						</i>
						<?php _e( 'Documentation', 'ohio-extra' ); ?>
					</a>
				</li>
			</ul>
			<div class="clb-hub-container clb-page-container">
				
				<!-- WP notices here -->
				<div class="wp-header-end"></div>

				<div class="inner-wrap">
					<div class="tab-item" id="tabs-1">
						<?php include 'parts/dashboard/theme-license-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-2" style="display: none;">
						<?php include 'parts/dashboard/whats-new-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-3" style="display: none;">
						<?php include 'parts/dashboard/system-status-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-4" style="display: none;">
						<?php include 'parts/dashboard/faq-section.php'; ?>
					</div>
					<div class="tab-item" id="tabs-5" style="display: none;">
						<?php include 'parts/dashboard/help-section.php'; ?>
					</div>

					<?php include 'parts/footer.php'; ?>

				</div>
			</div>
		</div>
	</div>
</div>