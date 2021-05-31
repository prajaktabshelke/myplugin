<?php
/*
    Plugin name: data form
    Plugin URI: https://www.google.com/
    Description: A simple wordpress customize plugin.
    Author: Prajakta Shelke
    Author URI: http://www.google.com
    Version: 1.0

    */
add_action('admin_menu', 'addMenu');
//function addMenu()
//{
//  add_menu_page("data Options", "data Options", 4, "data-options", "datamenu");
//}

//function dataMenu()
//{
//  echo "Hello Word!";
//}
/*function awepop_add_view()
{
    if (is_single()) {
        global $post;
        $current_views = get_post_meta($post->ID, "awepop_views", true);
        if (!isset($current_views) or empty($current_views) or !is_numeric($current_views)) {
            $current_views = 0;
        }
        $new_views = $current_views + 1;
        update_post_meta($post->ID, "awepop_views", $new_views);
        return $new_views;
    }
}
?>*/

class MyPlugin
{

    private $my_plugin_screen_name;
    private static $instance;
    /*......*/

    static function GetInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function PluginMenu()
    {
        $this->my_plugin_screen_name = add_menu_page(
            'My Plugin',
            'My Plugin',
            'manage_options',
            __FILE__,
            array($this, 'RenderPage'),
            plugins_url('/image/icon.png', __DIR__)

        );
    }

    public function RenderPage()
    {
?>
        <div class='wrap'>
            <h2></h2>
        </div>
<?php
    }

    public function InitPlugin()
    {
        add_action('admin_menu', array($this, 'PluginMenu'));
    }
}

$MyPlugin = MyPlugin::GetInstance();
$MyPlugin->InitPlugin();



?>