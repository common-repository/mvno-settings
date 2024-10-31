<div class="wrap" id="mvno_settings_div">
<!-- <img width="100%" src="../wp-content/plugins/mvno-settings/header_img.png"> -->
<img width="100%" src="<?php echo plugin_dir_url( dirname( __FILE__ ) )?>/header_img.png">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <?php
    if(!empty($mvno_info)){
        $data = $mvno_info;
    }else{
        $data = array();
    }
    ?>
    <p>Add your MVNO number and auth code information which is given to you by <a href="https://mvnop.com" target="_blank">MVNOP</a></p>
    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
        <div class="universal-message-container">
            <div class="options">
                <p>
                    <label>MVNO No.</label>
                    <input type="number" name="mvno_no" value="<?=(isset($data->mvno_number)?esc_html($data->mvno_number): '')?>" class="large-text" required/>
                </p>
            </div><!-- #universal-message-container -->

            <div class="options">
                <p>
                    <label>Auth Code</label>
                    <input type="text" name="auth_code" value="<?=(isset($data->auth_code)?esc_html($data->auth_code): '')?>" required class="large-text"/>
                </p>
            </div><!-- #universal-message-container -->
        </div>

        <!-- Add a hidden form field with the name "action" and a unique value that you can use to handle the form submission  -->
        <input type="hidden" name="action" value="my_simple_form">
        <?php
        wp_nonce_field( 'mvno-settings-save-nounce', 'mvno-settings-save-nounce' );
        submit_button();
        ?>

    </form>

    <form method="post">

        <div class="universal-message-container">

            <div class="options">
                <p>
                    <label>Add Grace Period (In Days)</label>
                    <input type="number" name="grace_period" value="<?=(isset($mvno_info->grace_period)?esc_html($mvno_info->grace_period): '')?>" required class="large-text"/>
                </p>
            </div>
        </div>
        <input type="hidden" name="action" value="my_simple_form">
        <?php
        wp_nonce_field( 'mvno-settings-save-nounce', 'mvno-settings-save-nounce' );
        submit_button();
        ?>
    </form>
    <div class="alert alert-success" id="mvno_settings_msg"></div>
    <div class="wrap">
        <a href="plugin-install.php?s=mvno-activation&tab=search&type=term">Click here to Download MVNO Activation Plugin</a>
    </div>
    <div class="wrap">
        <a href="plugin-install.php?s=mvno-portin&tab=search&type=term">Click here to Download MVNO Portin Plugin</a>
    </div>

    <img src="<?php echo plugin_dir_url(__FILE__).'loading.gif' ?>" width="100px" id="loader" style="display: none;">
</div><!-- .wrap -->