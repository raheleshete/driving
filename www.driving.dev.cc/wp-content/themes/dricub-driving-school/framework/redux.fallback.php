<?php

/**
 * fallback redux class
 */
if (!class_exists('Redux') && !class_exists('ReduxFramework')) {

    global $dricub_driving_school_options;

    class Redux {

        public static $hasOptions = false;

        public static function setArgs($option, $args) {
            $options = get_option($option, false);
            if (!empty($options)) {
                self::$hasOptions = true;
            }
        }

        public static function setSection($option, $args) {
            if (isset($args['fields']) && !empty($args['fields']) && !self::$hasOptions) {
                foreach ($args['fields'] as $field) {
                    if (isset($field['default']) && isset($field['id'])) {
                        $id = $field['id'];
                        $updateArr = get_option($option, array());
                        if (is_array($field['default'])) {
                            foreach ($field['default'] as $key => $val) {
                                $updateArr[$id][$key] = $val;
                            }
                            update_option($option, $updateArr);
                        } else {
                            $updateArr[$id] = $field['default'];
                            update_option($option, $updateArr);
                        }
                    }
                }
            }
        }

    }

     function dricub_driving_school_redux_fallback_init_var() {
        global $dricub_driving_school_opt;
        if (!is_admin() && !isset($dricub_driving_school_opt)) {
            $dricub_driving_school_opt = get_option('dricub_driving_school_opt');
			if(is_array($dricub_driving_school_opt)){
            foreach ($dricub_driving_school_opt as $yskey => $ysvalue) {
                if ($ysvalue == 'on') {
                    $dricub_driving_school_opt[$yskey] = true;
                } elseif ($ysvalue == 'off') {
                    $dricub_driving_school_opt[$yskey] = false;
                }
            }
			}
			
        }
    }

    add_action('init', 'dricub_driving_school_redux_fallback_init_var', 1);
}
