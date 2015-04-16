<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }
            define('TEMPWAY',get_template_directory());

            // This is needed. Bah WordPress bugs.  ;)
            if ( defined('TEMPWAY') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( TEMPWAY ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields


            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));

            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS

            $this->sections[] = array(
                'title' => __('Home Settings', 'redux-framework-demo'),
                'desc' => __('', 'redux-framework-demo'),
                'icon' => 'el-icon-home',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(

                    array(
                        'id' => 'main-color',
                        'type' => 'color',
                        'title' => __('Main Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a main color  (default: #ff0a60).', 'redux-framework-demo'),
                        'default' => '#ff0a60',
                        'validate' => 'color',
                    ),  

                    array(
                        'id' => 'background-style',
                        'type' => 'select',
                        'title' => __('Background Style', 'redux-framework-demo'),
                        'subtitle' => __('Image Background is only working on classic mode.', 'redux-framework-demo'),
                        'options' => array( 'image' => 'Image', 'background-color' => 'Color'),
                        'default' => 'background-color',
                    ), 

                     array(
                        'id' => 'image',
                        'required'    => array('background-style', 'equals', 'image'),
                        'type' => 'media',
                        'title' => __('Background Image', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Background Image', 'redux-framework-demo'),
                        'subtitle' => __('Upload Background Image', 'redux-framework-demo'),
                    ), 
                    array(
                        'id' => 'background-color',
                        'type' => 'color',
                        'required'    => array('background-style', 'equals', 'background-color'),
                        'title' => __('Background Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a main color  (default: #ff0a60).', 'redux-framework-demo'),
                        'default' => '#f5f5f5',
                        'validate' => 'color',
                    ),  
                    array(
                        'id' => 'section-media-start',
                        'type' => 'section',
                        'title' => __('Blog Options', 'redux-framework-demo'),
                        'subtitle' => __(' Please select Home Section Type ', 'redux-framework-demo'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),
                    array(
                        'id' => 'home-page-type',
                        'type' => 'select',
                        'title' => __('Blog Style', 'redux-framework-demo'),
                        'subtitle' => __('Select blog style', 'redux-framework-demo'),
                        'options' => array( 'modern' => 'Modern Blog', 'classic' => 'Classic Blog'),
                        'default' => 'classic',
                    ), 
                    array(
                        'id'       => 'classic-excerpt',
                        'required'    => array('home-page-type', 'equals', 'classic'),       
                        'type'     => 'spinner', 
                        'title'    => __('Post Excerpt Word Count', 'redux-framework-demo'),
                        'desc'     => __('Post Excerpt Word Count. Default : 95 Word', 'redux-framework-demo'),
                        'default'  => '95',
                        'min'      => '0',
                        'step'     => '1',
                        'max'      => '5000',
                    ),  
                    array(
                        'id'       => 'modern-excerpt',
                        'required'    => array('home-page-type', 'equals', 'modern'),       
                        'type'     => 'spinner', 
                        'title'    => __('Post Excerpt Word Count', 'redux-framework-demo'),
                        'desc'     => __('Post Excerpt Word Count. Default : 95 Word', 'redux-framework-demo'),
                        'default'  => '21',
                        'min'      => '0',
                        'step'     => '1',
                        'max'      => '5000',
                    ),  
                    array(
                        'id' => 'blog-grid',
                        'required'    => array('home-page-type', 'equals', 'modern'),       
                        'type' => 'select',
                        'title' => __('Grid Type', 'redux-framework-demo'),
                        'subtitle' => __('', 'redux-framework-demo'),
                        'options' => array( '1' => '1 Grid', '2' => '2 Grid','3' => '3 Grid', '4' => '4 Grid','5' => '5 Grid', '6' => '6 Grid'),
                        'default' => '1',
                    ),                                     

                     array(
                        'id' => 'grid-page-count',
                        'required'    => array('home-page-type', 'equals', 'modern'),
                        'type' => 'text',
                        'title' => __('Grid Page Count', 'redux-framework-demo'),
                        'desc' => __('Grid Page Count', 'redux-framework-demo'),
                        'subtitle' => __('Grid Page Count', 'redux-framework-demo'),
                        'default' => '3'
                    ),

                    array(
                        'id' => 'blog-grid-background',
                        'required'    => array('home-page-type', 'equals', 'modern'),  
                        'type' => 'media',
                        'title' => __('Blog Grid Background', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Blog Grid Background (Height is not bigger than 420px) ', 'redux-framework-demo'),
                        'subtitle' => __('Blog Grid Background', 'redux-framework-demo'),
                    ),  

                    array(
                        'id' => 'sidebar-type',
                        'type' => 'select',
                        'required'    => array('home-page-type', 'equals', 'classic'),  
                        'title' => __('Home Sidebar Position', 'redux-framework-demo'),
                        'subtitle' => __('Home Sidebar Position Layout', 'redux-framework-demo'),
                        'options' => array( 'right' => 'Right Sidebar', 'left' => 'Left Sidebar', 'none' => 'No Sidebar'),
                        'default' => 'right',
                    ),

                    array(
                        'id' => 'blog_sidebar',
                        'type' => 'select',
                        'required' => array('sidebar-type', 'not', 'none'),
                        'title' => __('Home Blog Sidebar', 'Theme2035Framework'),
                        'subtitle' => __('Select your blog sidebar', 'redux-framework-demo'),
                        'desc' => __('', 'Theme2035Framework'),
                        'data'      => 'sidebars',
                        'default' => 'sidebar-1',
                    ),
                    array(
                        'id' => 'blog-post-page-type',     
                        'type' => 'select',
                        'title' => __('Blog Post Page Type', 'redux-framework-demo'),
                        'subtitle' => __('', 'redux-framework-demo'),
                        'options' => array( 'modern' => 'Modern', 'classic' => 'Classic'),
                        'default' => 'classic',
                    ),

                    array(
                        'id'       => 'loading-area',
                        'type'     => 'switch', 
                        'title'    => __('Loading', 'redux-framework-demo'),
                        'subtitle' => __('Loading options', 'redux-framework-demo'),
                        'default'  => true,
                    ),                  
                    array(
                        'id'       => 'header-search',
                        'type'     => 'switch', 
                        'title'    => __('Header Search Icon', 'redux-framework-demo'),
                        'subtitle' => __('Header Search Icon', 'redux-framework-demo'),
                        'default'  => true,
                    ),                      
                    array(
                        'id'       => 'push-sidebar-icon',
                        'type'     => 'switch', 
                        'title'    => __('Push Sidebar', 'redux-framework-demo'),
                        'subtitle' => __('Push Sidebar', 'redux-framework-demo'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'modern-social-area',
                        'type'     => 'switch', 
                        'title'    => __('Modern Social & Newsletter', 'redux-framework-demo'),
                        'subtitle' => __('Modern Social & Newsletter', 'redux-framework-demo'),
                        'default'  => true,
                    ),  
                    array(
                        'id'       => 'minify-css-js',
                        'type'     => 'switch', 
                        'title'    => __('Minify Js and Css', 'redux-framework-demo'),
                        'subtitle' => __('Speed Up your theme', 'redux-framework-demo'),
                        'default'  => false,
                    ),  
                    array(
                        'id' => 'section-media-start',
                        'type' => 'section',
                        'title' => __('Page Options', 'redux-framework-demo'),
                        'subtitle' => __(' Page Sidebar Options', 'redux-framework-demo'),
                        'indent' => true // Indent all options below until the next 'section' option is set.
                    ),  
                    array(
                        'id' => 'page-sidebar-type',
                        'type' => 'select',
                        'required'    => array('home-page-type', 'equals', 'classic'),  
                        'title' => __('Page Sidebar Position', 'redux-framework-demo'),
                        'subtitle' => __('Page Sidebar Position Layout', 'redux-framework-demo'),
                        'options' => array( 'right' => 'Right Sidebar', 'left' => 'Left Sidebar', 'none' => 'No Sidebar'),
                        'default' => 'right',
                    ),
                    array(
                        'id' => 'blog_sidebar',
                        'type' => 'select',
                        'required' => array('sidebar-type', 'not', 'none'),
                        'title' => __('Blog Sidebar', 'Theme2035Framework'),
                        'subtitle' => __('Select your blog sidebar', 'redux-framework-demo'),
                        'desc' => __('', 'Theme2035Framework'),
                        'data'      => 'sidebars',
                        'default' => 'sidebar-1',
                    ),                                                                            
                ),
            );

            

            $this->sections[] = array(
                'icon' => 'el-icon-circle-arrow-down',
                'title' => __('Logo & Favicon', 'redux-framework-demo'),
                'fields' => array(
                     array(
                        'id' => 'logo',
                        'type' => 'media',
                        'title' => __('Logo', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Logo', 'redux-framework-demo'),
                        'subtitle' => __('Upload Logo', 'redux-framework-demo'),
                    ), 
                    array(
                        'id'       => 'logo-height',
                        'type'     => 'spinner', 
                        'title'    => __('Logo Height', 'redux-framework-demo'),
                        'subtitle' => __('Logo Height (Default 50px)','redux-framework-demo'),
                        'desc'     => __('Logo Height (Default 50px)', 'redux-framework-demo'),
                        'default'  => '50',
                        'min'      => '15',
                        'step'     => '1',
                        'max'      => '160',
                    ),
                     array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'title' => __('Favicon', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Favicon', 'redux-framework-demo'),
                        'subtitle' => __('Upload Logo', 'redux-framework-demo'),
                    ), 
                     array(
                        'id' => 'ipad_retina_icon',
                        'type' => 'media',
                        'title' => __('Ipad Retina Icon (144x144)', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Ipad Retina Icon (144x144)', 'redux-framework-demo'),
                        'subtitle' => __('Upload Ipad Retina Icon', 'redux-framework-demo'),
                    ),   
                     array(
                        'id' => 'iphone_icon_retina',
                        'type' => 'media',
                        'title' => __('Iphone Retina Icon (114x114)', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Iphone Retina Icon (114x114)', 'redux-framework-demo'),
                        'subtitle' => __('Upload Iphone Retina Icon', 'redux-framework-demo'),
                    ), 
                      array(
                        'id' => 'ipad_icon',
                        'type' => 'media',
                        'title' => __('Ipad Icon (72x72)', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Ipad Icon (72x72)', 'redux-framework-demo'),
                        'subtitle' => __('Upload Ipad Icon', 'redux-framework-demo'),
                    ), 
                      array(
                        'id' => 'iphone_icon',
                        'type' => 'media',
                        'title' => __('Iphone Icon (57x57)', 'redux-framework-demo'),
                        'compiler' => 'true',
                        'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Iphone Icon (57x57)', 'redux-framework-demo'),
                        'subtitle' => __('Upload Iphone Icon', 'redux-framework-demo'),
                    ),                                                                                                          
                )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-text-width',
                'title' => __('Typography', 'redux-framework-demo'),

                'fields' => array(
                    array(
                        'id' => 'fontselect',
                        'type' => 'select',
                        'title' => __('Title Font', 'redux-framework-demo'),
                        'subtitle' => __('Title Font', 'redux-framework-demo'),
                        'options' => array( 'customfont' => 'Custom Font', 'googlefont' => 'Google Font'),
                        'default' => 'customfont',
                    ),
                    array(
                        'id' => 'custom-font-name',
                        'required'    => array('fontselect', 'equals', 'customfont'),
                        'type' => 'text',
                        'title' => __('Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Font Name', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "novecento_bold",
                    ), 
                    array(
                        'id' => 'eot',
                        'required'    => array('fontselect', 'equals', 'customfont'),
                        'type' => 'text',
                        'title' => __('Custom Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_bold.eot",
                    ),                    
                    array(
                        'id' => 'woff',
                        'required'    => array('fontselect', 'equals', 'customfont'),
                        'type' => 'text',
                        'title' => __('Custom Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_bold.woff",
                    ),                      
                    array(
                        'id' => 'ttf',
                        'required'    => array('fontselect', 'equals', 'customfont'),
                        'type' => 'text',
                        'title' => __('Custom Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_bold.ttf",
                    ),
                    array(
                        'id' => 'title-font',
                        'required'    => array('fontselect', 'equals', 'googlefont'),
                        'type' => 'typography',
                        'title' => __('Title Font', 'redux-framework-demo'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        'word-spacing'=>false, // Defaults to false
                        'letter-spacing'=>false, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h2.site-description'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'px', // Defaults to px
                        'subtitle' => __('Title Font', 'redux-framework-demo'),
                        'default' => array(
                            'color' => "#555",
                            'font-weight' => '400',
                            'font-family' => 'Raleway',
                            'google' => true,
                        ),
                    ),
                    array(
                        'id' => 'fontselect-second',
                        'type' => 'select',
                        'title' => __('Second Title Font', 'redux-framework-demo'),
                        'subtitle' => __('Second Title Font', 'redux-framework-demo'),
                        'options' => array( 'customfont-second' => 'Custom Font', 'googlefont-second' => 'Google Font'),
                        'default' => 'customfont-second',
                    ),
                    array(
                        'id' => 'custom-font-name-second',
                        'required'    => array('fontselect-second', 'equals', 'customfont-second'),
                        'type' => 'text',
                        'title' => __('Font Name', 'redux-framework-demo'),
                        'subtitle' => __('Font Name', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "novecento_demibold",
                    ), 
                    array(
                        'id' => 'eot-second',
                        'required'    => array('fontselect-second', 'equals', 'customfont-second'),
                        'type' => 'text',
                        'title' => __('Custom Font (eot)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (eot) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (eot) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_demibold.eot",
                    ),                   
                    array(
                        'id' => 'woff-second',
                        'required'    => array('fontselect-second', 'equals', 'customfont-second'),
                        'type' => 'text',
                        'title' => __('Custom Font (woff)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (woff) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (woff) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_demibold.woff",
                    ),                      
                    array(
                        'id' => 'ttf-second',
                        'required'    => array('fontselect-second', 'equals', 'customfont-second'),
                        'type' => 'text',
                        'title' => __('Custom Font (ttf)', 'redux-framework-demo'),
                        'desc' => __('Custom Font (ttf) URL', 'redux-framework-demo'),
                        'subtitle' => __('Custom Font (ttf) URL', 'redux-framework-demo'),
                        'default' => THEMEROOT."/fonts/novecento_demibold.ttf",
                    ),
                    array(
                        'id' => 'title-font-second',
                        'required'    => array('fontselect-second', 'equals', 'googlefont-second'),
                        'type' => 'typography',
                        'title' => __('Title Font', 'redux-framework-demo'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        'word-spacing'=>false, // Defaults to false
                        'letter-spacing'=>false, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h2.site-description'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'px', // Defaults to px
                        'subtitle' => __('Title Font', 'redux-framework-demo'),
                        'default' => array(
                            'color' => "#555",
                            'font-weight' => '400',
                            'font-family' => 'Raleway',
                            'google' => true,
                        ),
                    ),
                    array(
                        'id' => 'site-font',
                        'type' => 'typography',
                        'title' => __('Site Font', 'redux-framework-demo'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => false, // Select a backup non-google font in addition to a google font
                        'font-style'=>true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-weight'=>true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>true, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>true,
                        //'preview'=>false, // Disable the previewer
                        'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                        'output' => array('h21.site-description'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler' => array('h21.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units' => 'px', // Defaults to px
                        'subtitle' => __('Site Font', 'redux-framework-demo'),
                        'default' => array(
                            'font-family' => 'Open Sans',
                            'font-weight' => '400',
                            'color' => '#666',
                            'google' => true,
                            'subsets' => 'Latin'),
                    ),

                )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-bullhorn',
                'title' => __('Newsletter & Social', 'redux-framework-demo'),
                'fields' => array(
                    array(
                        'id' => 'newsletter-area',
                        'type' => 'textarea',
                        'title' => __('Newsletter Shortcode', 'redux-framework-demo'),
                        'subtitle' => __('Please add your newsletter form shortcode.', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-facebook',
                        'type' => 'text',
                        'title' => __('Facebook', 'redux-framework-demo'),
                        'subtitle' => __('Type your facebook url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.facebook.com/2035themes",
                    ),
                    array(
                        'id' => 'social-twitter',
                        'type' => 'text',
                        'title' => __('Twitter', 'redux-framework-demo'),
                        'subtitle' => __('Type your twitter url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.twitter.com/2035themes",
                    ),
                    array(
                        'id' => 'social-googleplus',
                        'type' => 'text',
                        'title' => __('Google Plus', 'redux-framework-demo'),
                        'subtitle' => __('Type your google plus url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.google.com/2035themes",
                    ),
                    array(
                        'id' => 'social-linkedin',
                        'type' => 'text',
                        'title' => __('Linkedin', 'redux-framework-demo'),
                        'subtitle' => __('Type your linkedin url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.linkedin.com/2035themes",
                    ),
                    array(
                        'id' => 'social-codepen',
                        'type' => 'text',
                        'title' => __('Codepen', 'redux-framework-demo'),
                        'subtitle' => __('Type your codepen url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.codepen.com/2035themes",
                    ),
                    array(
                        'id' => 'social-behance',
                        'type' => 'text',
                        'title' => __('Behance', 'redux-framework-demo'),
                        'subtitle' => __('Type your behance url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.behance.com/2035themes",
                    ),
                    array(
                        'id' => 'social-deviantart',
                        'type' => 'text',
                        'title' => __('Deviantart', 'redux-framework-demo'),
                        'subtitle' => __('Type your deviantart url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.deviantart.com/2035themes",
                    ),
                    array(
                        'id' => 'social-dribbble',
                        'type' => 'text',
                        'title' => __('Dribbble', 'redux-framework-demo'),
                        'subtitle' => __('Type your dribbble url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.dribbble.com/2035themes",
                    ),
                    array(
                        'id' => 'social-foursquare',
                        'type' => 'text',
                        'title' => __('Foursquare', 'redux-framework-demo'),
                        'subtitle' => __('Type your foursquare url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'default' => "http://www.foursquare.com/2035themes",
                    ),
                    array(
                        'id' => 'social-flickr',
                        'type' => 'text',
                        'title' => __('Flickr', 'redux-framework-demo'),
                        'subtitle' => __('Type your flickr url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-github',
                        'type' => 'text',
                        'title' => __('GitHub', 'redux-framework-demo'),
                        'subtitle' => __('Type your github url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-instagram',
                        'type' => 'text',
                        'title' => __('Instagram', 'redux-framework-demo'),
                        'subtitle' => __('Type your instagram url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-pinterest',
                        'type' => 'text',
                        'title' => __('Pinterest', 'redux-framework-demo'),
                        'subtitle' => __('Type your pinterest url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-soundcloud',
                        'type' => 'text',
                        'title' => __('Sound Cloud', 'redux-framework-demo'),
                        'subtitle' => __('Type your soundcloud url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-tumblr',
                        'type' => 'text',
                        'title' => __('Tumblr', 'redux-framework-demo'),
                        'subtitle' => __('Type your tumblr url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-vimeo',
                        'type' => 'text',
                        'title' => __('Vimeo', 'redux-framework-demo'),
                        'subtitle' => __('Type your vimeo url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-vine',
                        'type' => 'text',
                        'title' => __('Vine', 'redux-framework-demo'),
                        'subtitle' => __('Type your vine url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id' => 'social-youtube',
                        'type' => 'text',
                        'title' => __('Youtube', 'redux-framework-demo'),
                        'subtitle' => __('Type your youtube url', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                    ),                                                                                               
                )
            );


            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => __('Single Post Options', 'redux-framework-demo'),
                'fields' => array(
                    array(
                        'id'       => 'featured-image-crop',
                        'type'     => 'switch', 
                        'title'    => __('Crop My Feature Image', 'redux-framework-demo'),
                        'subtitle' => __('Crop My Feature Image (If you switch of this feature your website will may slow. Please upload your image Max, 750px(Width) )', 'redux-framework-demo'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'featured-image-zoom',
                        'type'     => 'switch', 
                        'title'    => __('Featured Image Zoom', 'redux-framework-demo'),
                        'subtitle' => __('Featured Image Zoom', 'redux-framework-demo'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'author-visibility',
                        'type'     => 'switch', 
                        'title'    => __('Show Author', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ), 
                    array(
                        'id'       => 'post-ratings',
                        'type'     => 'switch', 
                        'title'    => __('Post Ratings', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => false,
                    ),   
                    array(
                        'id'       => 'post-increase-decrease',
                        'type'     => 'switch', 
                        'title'    => __('Show Font Increase/decrease', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ),               
                    array(
                        'id'       => 'related-post-visibility',
                        'type'     => 'switch', 
                        'title'    => __('Show Related Post', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ), 
                    array(
                        'id'       => 'prev-next',
                        'type'     => 'switch', 
                        'title'    => __('Show Prev/Next Post', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ),  
                    array(
                        'id'       => 'progress-bar',
                        'type'     => 'switch', 
                        'title'    => __('Show Reading Progress', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ), 
                    array(
                        'id'       => 'modern-effect',
                        'type'     => 'switch', 
                        'title'    => __('Modern Post Scroll Effect', 'redux-framework-demo'),
                        'subtitle' => __('Post options', 'redux-framework-demo'),
                        'default'  => true,
                    ),                                                                                                             
                )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-css',
                'title' => __('Custom Css', 'redux-framework-demo'),
                'fields' => array(
                    array(
                        'id' => 'custom-css-area',
                        'type' => 'textarea',
                        'title' => __('Custom CSS', 'redux-framework-demo'),
                        'subtitle' => __('Quickly add some CSS to your theme by adding it to this block.', 'redux-framework-demo'),
                        'desc' => __('', 'redux-framework-demo'),
                        'validate' => 'css',
                    ),                                                                                                                      
                )
            );
            
            $this->sections[] = array(
                'icon' => 'el-icon-graph',
                'title' => __('Tracking Code', 'redux-framework-demo'),
                'fields' => array(
                    array(
                        'id'        => 'track_code',
                        'type'      => 'ace_editor',
                        'title'     => __('JS Code', 'redux-framework-demo'),
                        'subtitle'  => __('Paste your JS code here.', 'redux-framework-demo'),
                        'mode'      => 'javascript',
                        'theme'     => 'chrome',
                        'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default'   => ""
                    ),                                                                                                                                                            
                )
            );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'redux-framework-demo'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'redux-framework-demo'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'redux-framework-demo'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'theme_prefix', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Blogy Options', 'redux-framework-demo'),
                'page_title' => __('Blogy Options', 'redux-framework-demo'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyC_DvFJA7SljYfSGUwT-N5VQWhz2iMK-RQ', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => 'http://www.2035themes.com/tools/blog/admin_options_logo.png', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );
                'hints' => array(
                    'icon'              => 'icon-question-sign',
                    'icon_position'     => 'right',
                    'icon_color'        => 'lightgray',
                    'icon_size'         => 'normal',

                    'tip_style'         => array(
                        'color'     => 'light',
                        'shadow'    => true,
                        'rounded'   => false,
                        'style'     => '',
                    ),
                    'tip_position'      => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );




            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p> Theme2035 Framework', 'redux-framework-demo'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p> Blog Admin Panel </p>', 'redux-framework-demo');
        }

    }

    new Redux_Framework_sample_config();
}


/**

  Custom function for the callback referenced above

 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**

  Custom function for the callback validation referenced above

 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
