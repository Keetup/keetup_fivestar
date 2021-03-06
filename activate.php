<?php
/**
 * Activate Keetup Fivestar plugin
 *
 */

keetup_fivestar_create_db();
keetup_fivestar_settings();

// Upgrade settings
$oldversion = elgg_get_plugin_setting('version', 'keetup_fivestar');
// Check if we need to run an upgrade
if (!$oldversion) {
    $plugin = elgg_get_plugin_from_id('keetup_fivestar');
    // Old versions of Keetup Fivestar used an array named view to save the Fivestar views which
    // results in an issue with the plugin to be shown in the plugin list in the admin section.
    // New name is keetup_fivestar_view and the old array needs to get deleted from the database.
    $view = $plugin->view;
    if (is_string($view)) {
        $plugin->__unset('view');
        $plugin->save();
    }
    // Set new version
    elgg_set_plugin_setting('version', '1.8.5', 'keetup_userpoints');
} else if ($oldversion != '1.8.5') {
    // Set new version
    elgg_set_plugin_setting('version', '1.8.5', 'keetup_userpoints');
}
