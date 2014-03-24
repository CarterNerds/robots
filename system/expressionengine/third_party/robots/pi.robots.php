<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$plugin_info = array(
    'pi_name'       => 'Carter Robots',
    'pi_version'    => '1.0',
    'pi_author'     => 'Carter Digital',
    'pi_author_url' => '',
    'pi_description'=> 'Robots.txt file based on the ENV',
    'pi_usage'      => Robots::usage()
);


class Robots {

    public $return_data;
    public $cat_id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->EE =& get_instance();

    }

    public function txt()
    {
        if (defined('ENV')){

            switch (ENV) {
                case 'prod' :
$robots = "User-agent: *
Disallow: ";
                break;

                case 'stage' :
$robots = "User-agent: *
Disallow: /";
                break;

                case 'dev' :
$robots = "User-agent: *
Disallow: /";
                break;

                default :
$robots = "User-agent: *
Disallow: /";
                break;
            }

        }

        return $robots;

    }

    // ----------------------------------------------------------------

    /**
     * Plugin Usage
     */
    public static function usage()
    {
        ob_start();
?>
Create a template group called robots.txt and in the index file add:
{exp:robots:txt}

This will change the allowed directories based on Focus Lab's excellent Master Config

The disallowed paths can be tweaked within the plugin.

<?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}


/* End of file pi.category_info.php */
/* Location: /system/expressionengine/third_party/category_info/pi.category_info.php */