<?php
/**
 * chrimbo Custom Metabox
 *
 * @package chrimbo
 */
$chrimbo_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'chrimbo_add_layout_metabox');
function chrimbo_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option('page_on_front');
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $chrimbo_post_types;
    foreach ( $chrimbo_post_types as $post_type ) {
        add_meta_box(
            'chrimbo_layout_options', // $id
            __( 'Layout options', 'chrimbo' ), // $title
            'chrimbo_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}

/* chrimbo featured layout */
$chrimbo_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => __( 'Full', 'chrimbo' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => __( 'Right ', 'chrimbo' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => __( 'Left', 'chrimbo' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => __( 'No Image', 'chrimbo' )
    )
);

function chrimbo_layout_options_callback() {

    global $post , $chrimbo_single_post_image_align_options;
    $chrimbo_customizer_saved_values = chrimbo_get_all_options(1);

    /*chrimbo-single-post-image-align*/
    $chrimbo_single_post_image_align = $chrimbo_customizer_saved_values['chrimbo-single-post-image-align'];

    wp_nonce_field( basename( __FILE__ ), 'chrimbo_layout_options_nonce' );
    ?>
    <style>
        .hide-radio{
            position: relative;
            margin-bottom: 6px;
        }

        .hide-radio img, .hide-radio label{
            display: block;
        }

        .hide-radio input[type="radio"]{
            position: absolute;
            left: 50%;
            top: 50%;
            opacity: 0;
        }

        .hide-radio input[type=radio] + label {
            border: 3px solid #F1F1F1;
        }

        .hide-radio input[type=radio]:checked + label {
            border: 3px solid #CCC;
        }
    </style>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php _e( 'Featured Image Alignment', 'chrimbo' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $chrimbo_single_post_image_align_meta = get_post_meta( $post->ID, 'chrimbo-single-post-image-align', true );
                if( false != $chrimbo_single_post_image_align_meta ){
                    $chrimbo_single_post_image_align = $chrimbo_single_post_image_align_meta;
                }
                foreach ($chrimbo_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="chrimbo-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $chrimbo_single_post_image_align ); ?>/>
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function chrimbo_save_sidebar_layout( $post_id ) {
    global $post;
    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'chrimbo_layout_options_nonce' ] ) || !wp_verify_nonce( $_POST[ 'chrimbo_layout_options_nonce' ], basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }

    /*image align*/
    if(isset($_POST['chrimbo-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'chrimbo-single-post-image-align', true);
        $new = sanitize_text_field($_POST['chrimbo-single-post-image-align']);
        if ($new && $new != $old) {
            update_post_meta($post_id, 'chrimbo-single-post-image-align', $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id,'chrimbo-single-post-image-align', $old);
        }
    }
}
add_action('save_post', 'chrimbo_save_sidebar_layout');
