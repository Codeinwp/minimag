<?php
add_action( 'admin_init', 'minimag_theme_options_init' );
add_action( 'admin_menu', 'minimag_theme_options_add_page' );
function minimag_theme_options_init(){
	register_setting( 'minimag_theme_options', 'minimag_theme_options', 'minimag_theme_options_validate' );
}
function minimag_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'minimag' ), __( 'Theme Options', 'minimag' ), 'edit_theme_options', 'theme_options', 'minimag_theme_options_do_page');
}
$minimag_select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'minimag' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'minimag' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'minimag' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'minimag' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'minimag' )
	),
	'5' => array(
		'value' => '5',
		'label' => __( 'Five', 'minimag' )
	)
);
$minimag_radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'minimag' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'minimag' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'minimag' )
	)
);
function minimag_theme_options_do_page() {
	global $minimag_select_options, $minimag_radio_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_enqueue_script("jquery-ui-core"); ?>
	<?php wp_enqueue_script("jquery-ui-tabs"); ?> 
	<?php   wp_enqueue_media(); ?>
	<?php   wp_enqueue_style('minimag-admin-ui-css',
                get_template_directory_uri() . '/jquery-ui.css',
                false,
                '20130115',
                false);
				?>
	<script>
jQuery("document").ready(function() {
    jQuery( "#tabs" ).tabs();
    var _custom_media = true,
      _orig_send_attachment = wp.media.editor.send.attachment;
  jQuery('.selector-image').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button =   jQuery(this);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( _custom_media ) {
		  jQuery("#"+id+"_image").attr("src",attachment.url);
          jQuery("#"+id).val(attachment.id);
		  jQuery("#"+id+"_image").attr("src",attachment.url);
      } else {
        return _orig_send_attachment.apply( this, [props, attachment] );
      };
    }
    wp.media.editor.open(button);
    return false;
  });
  jQuery('.add_media').on('click', function(){
    _custom_media = false;
  });
});
</script>
<style >
	.ui-widget-header{
		background:none !important;
		border:none !important;
		border-bottom:1px solid #aed0ea !important;
	}
	.verti-setting-field .image-upload	a{
		position:relative;
		top:-20px; 
	} 
	.clear{
		clear:both;
	}
</style>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'minimag' ) . "</h2>"; ?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'minimag' ); ?></strong></p></div>
		<?php endif; ?>
		<form method="post" action="options.php">
			<?php settings_fields( 'minimag_theme_options' ); ?>
			<?php $options = get_option( 'minimag_theme_options' ); ?>
						<div id="tabs">
				<ul>
					<li><a href="#tabs-1"><?php _e( 'General settings', 'minimag' ); ?></a></li>
					<!-- <li><a href="#tabs-2"><?php _e( 'Banners', 'minimag' ); ?></a></li> -->
				</ul>
			<div id="tabs-1">
				<p>
						 <table class="form-table">
                            <tr valign="top" class="verti-setting-field "> 
                                <td class="image-upload" >
                                    <img src="<?php 
									$img =  wp_get_attachment_image_src($options['CMlogo'],array(227,65));
										if(empty($img)){
											echo get_template_directory_uri()."/images/conceptdesign-logo.png";
										}else{
											 echo $img[0];
										}
									?>" width="227" height="65" id="CMlogo_image"/>
										<div class="clear"></div><br/>
                                    <a id="CMlogo_button" class="selector-image button-primary" class="button-primary"><?php _e( 'Logo (227x65)', 'minimag' ); ?> </a>
                                    <input   id="CMlogo" class="regular-text" type="hidden" name="minimag_theme_options[CMlogo]" value="<?php 
										if(isset($options['CMlogo'] )) { 
										esc_attr_e($options['CMlogo'] ); 
										}
									  ?>"  /> 
                                    <div class="clear"></div>
                                </td> 
                            </tr> 
                            <tr valign="top" class="verti-setting-field "> 
                                <td  >
									<p><?php _e( 'Facebook link', 'minimag' ); ?></p>
                                </td> 
                                <td  >
									<input   id="CMfb" class="regular-text" type="text" name="minimag_theme_options[CMfb]" value="<?php 
									if(isset($options['CMfb'] )) { 
										esc_attr_e( $options['CMfb'] ); 
									} ?>"  /> 
                                </td> 
                            </tr> 
                            <tr valign="top" class="verti-setting-field "> 
                                <td  >
									<p><?php _e( 'Twitter link', 'minimag' ); ?></p>
                                </td> 
                                <td  >
									<input   id="CMfb" class="regular-text" type="text" name="minimag_theme_options[CMtw]" value="<?php 
									if(isset($options['CMtw'] )) { 
										esc_attr_e( $options['CMtw'] ); 
									} ?>"  /> 
                                </td> 
                            </tr> 
                            <tr valign="top" class="verti-setting-field "> 
                                <td  >
									<p><?php _e( 'RSS link', 'minimag' ); ?></p>
                                </td> 
                                <td  >
									<input   id="CMfb" class="regular-text" type="text" name="minimag_theme_options[CMrss]" value="<?php 
									if(isset($options['CMrss'] )) { 
										esc_attr_e( $options['CMrss'] ); 
									} ?>"  /> 
                                </td> 
                            </tr> 
                         </table>   
				</p>
			</div> 
			<div id="tabs-2">
				<p>
						 <table class="form-table">
                            <tr valign="top" class="verti-setting-field "> 
<!--
                                <td  >
									<p><?php _e( 'Banner header ', 'minimag' ); ?></p>
                                </td> 
                                <td  >
									<textarea  cols="60" rows="6" class="regular-text" name="minimag_theme_options[CMbh]"><?php 
									if(isset($options['CMbh'] )) { 
										esc_attr_e( $options['CMbh'] ); 
									} ?></textarea> 
                                </td> 
-->
                            </tr>  
                         </table>   
				</p>
			</div> 
			</div>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'minimag' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function minimag_theme_options_validate( $input ) {
	global $minimag_select_options, $minimag_radio_options;
	$input['CMlogo'] = wp_filter_nohtml_kses( $input['CMlogo'] );
	$input['CMfb'] = wp_filter_nohtml_kses( $input['CMfb'] );
	$input['CMtw'] = wp_filter_nohtml_kses( $input['CMtw'] );
	$input['CMrss'] = wp_filter_nohtml_kses( $input['CMrss'] );
	$input['CMbh'] = wp_filter_nohtml_kses( $input['CMbh'] );
	return $input;
}