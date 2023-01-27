<?php
$admin_instance = WFACP_admin::get_instance();

$preview_url = get_the_permalink( $wfacp_id );

?>
<div class="wfacp_template_preview_container">
    <div class="wfacp_form_templates_outer" v-if="'yes'==template_active">
        <div class="wfacp_heading_choosen_template">
            <div class="wfacp_funnel_heading">
                <strong><?php esc_html_e( 'Selected Template', 'woofunnels-aero-checkout' ) ?> :</strong>&nbsp;
                <span>{{selected_template.name}}</span>&nbsp;
                ({{selected_template.no_steps== '3' ? wfacp_localization.design.preview_step.third_step : (selected_template.no_steps == '2' ? wfacp_localization.design.preview_step.two_step :
                wfacp_localization.design.preview_step.single_step)}})
                <span class="bwfan-tag-rounded bwfan_ml_12 clr-primary">{{wfacp_data.design.design_types[selected_type]}}</span>
            </div>
            <div class="wfacp_funnel_header_action">

                <div class="wffn-ellipsis-menu">
					<div class="wffn-ellipsis-menu__toggle">
						<?php echo file_get_contents(  plugin_dir_path( WFACP_PLUGIN_FILE ) . 'admin/assets/img/icons/ellipsis-menu.svg'  ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="wffn-ellipsis-menu-dropdown">
						<a href="javascript:void(0)" class="wffn-ellipsis-menu-item" v-on:click="get_remove_template()"> <?php echo file_get_contents(  plugin_dir_path( WFACP_PLUGIN_FILE ) . 'admin/assets/img/icons/delete.svg'  ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php esc_html_e( 'Remove Template' ) ?></a>
					</div>
				</div>
              
            </div>
        </div>
        <div class="wfacp_templates_inner wfacp_selected_designed">
            <div class="wfacp_templates_design" v-if="'yes'==selected_template.build_from_scratch">
                <div class="wfacp_temp_card">
                    <div class="wfacp_template_sec wfacp_build_from_scratch">
                        <div class="wfacp_template_sec_design">
                            <div class="wfacp_temp_overlay">
                                <div class="wfacp_temp_middle_align">
                                    <div class="wfacp_steps_btn_add">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 26">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill-rule="nonzero">
                                                    <g>
                                                        <path d="M18 11.526c-.321-.045-.653-.067-.985-.067-3.897 0-7.058 3.195-7.058 7.134 0 1.23.31 2.389.852 3.401L10.8 22H3.435C2.09 22 1 20.898 1 19.538V2.462C1 1.102 2.09 0 3.436 0h8.934v4.073c0 1.052.842 1.903 1.882 1.903H18v5.55z" transform="translate(-511 -232) translate(511 232)"></path>
                                                        <path fill="#FFF" fill-opacity=".25" d="M12 1l5 6h-3.328C12.747 7 12 6.146 12 5.09V1z" transform="translate(-511 -232) translate(511 232)"></path>
                                                        <path fill="#FFF" d="M17.983 11.255v-4.92c0-.141-.066-.271-.159-.374L12.225.168C12.121.06 11.972 0 11.825 0H2.947C1.309 0 0 1.317 0 2.932V19.47c0 1.615 1.309 2.91 2.948 2.91h7.006c1.364 2.276 3.817 3.62 6.484 3.62C20.607 26 24 22.662 24 18.549c0-1.81-.654-3.55-1.864-4.91-1.095-1.224-2.558-2.059-4.153-2.384zm-5.609-9.353l3.756 3.896h-2.436c-.726 0-1.32-.59-1.32-1.306v-2.59zM1.1 19.47V2.932c0-1.02.82-1.848 1.848-1.848h8.326v3.408c0 1.317 1.084 2.39 2.42 2.39h3.19v4.232c-.165-.005-.297-.027-.44-.027-1.92 0-3.685.726-5.016 1.864H4.444c-.303 0-.55.244-.55.542 0 .298.247.542.55.542h5.961c-.39.542-.715 1.084-.968 1.68H4.444c-.303 0-.55.244-.55.542 0 .298.247.542.55.542H9.08c-.138.542-.21 1.143-.21 1.745 0 .948.182 1.885.534 2.752H2.948c-1.029 0-1.848-.813-1.848-1.826zm15.338 5.452c-2.37 0-4.554-1.28-5.686-3.333-.512-.927-.781-1.973-.781-3.035 0-3.511 2.898-6.367 6.462-6.367.302 0 .605.022.901.06 1.53.211 2.937.959 3.96 2.108 1.034 1.16 1.6 2.65 1.6 4.2.006 3.51-2.892 6.367-6.456 6.367z" transform="translate(-511 -232) translate(511 232)"></path>
                                                        <path fill="#FFF" d="M4.577 11h5.846c.317 0 .577-.225.577-.5s-.26-.5-.577-.5H4.577c-.317 0-.577.225-.577.5s.26.5.577.5zM18.607 18.617h-1.204v-1.224c0-.216-.177-.393-.393-.393-.217 0-.393.177-.393.393v1.224h-1.224c-.216 0-.393.176-.393.393 0 .216.177.393.393.393h1.224v1.204c0 .216.176.393.393.393.216 0 .393-.177.393-.393v-1.204h1.204c.216 0 .393-.177.393-.393 0-.217-.177-.393-.393-.393z" transform="translate(-511 -232) translate(511 232)"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="wfacp_p"><b><?php echo esc_html__( 'Start from scratch', 'funnel-builder' ); ?></b></div>
                                    <div class="wfacp_clear_10"></div>
                                    <span class="wfacp_import_description"><?php esc_html_e( 'Create your Page from scratch', 'funnel-builder' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wf_funnel_clear_10"></div>
            </div>
            <div class="wfacp_templates_design wfacp_center_align" v-else="">
                <div class="wfacp_img" style="position: relative">
                    <div class="wfacp_template_importing_loader" style="display: none">
                        <span class="spinner"></span>
                    </div>
                    <div>
                        <img v-bind:src="selected_template.thumbnail">
                    </div>
                </div>
                <div class="wf_funnel_clear_10"></div>
            </div>
            <div class="wfacp_templates_action">
				<?php
				$get_post_meta = get_post_meta( $wfacp_id, '_elementor_data', true );
				if ( has_shortcode( maybe_serialize( $get_post_meta ), 'wfacp_forms' ) ) { ?>
                    <div v-if="`elementor` == selected_template.builder"><?php _e( 'Note: You can switch your checkout shortcode with the elementor checkout widget.', 'woofunnels-aero-checkout' ); ?></div>
				<?php } ?>
                <div class="wfacp_clear_20"></div>
                <a v-if="'embed_forms'!==selected_template.template_type" class="wfacp_funnel_btn_temp_alter wfacp_funnel_btn_blue_temp" v-bind:href="get_edit_link()">
                   
					<?php _e( 'Edit Template', 'woofunnels-aero-checkout' ) ?>
                </a>
                <a class="wfacp_funnel_btn_temp_alter wfacp_funnel_btn_blue_temp" v-else-if="'yes'==selected_template.show_shortcode" v-bind:href="wfacp_data.template_edit_url.embed_forms.url">
					<?php _e( 'Edit Template', 'woofunnels-aero-checkout' ) ?>
                </a>
                <a target="_blank" href="<?php echo $preview_url; ?>" class="wfacp_funnel_btn_temp_alter wfacp_funnel_btn_white_temp wfacp_blue_link">
					<?php _e( 'Preview', 'woofunnels-aero-checkout' ) ?>
                </a>
                <a class="wfacp_funnel_btn_temp_alter wfacp_funnel_btn_white_temp" href=" <?php echo admin_url( 'post.php?post=' . $wfacp_id . '&action=edit' ); ?>">
					<?php esc_html_e( ' Switch to WordPress Editor', 'funnel-builder' ) ?>
                </a>
            </div>
        </div>
        <div class="clear"></div>
		<?php
		do_action( 'wfacp_builder_design_after_template' );
		?>


    </div>
