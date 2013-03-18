<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin plugin to rebuild the course cache
 *
 * @package    tool
 * @subpackage rebuildcoursecache
 * @copyright  2013 Alex Rowe {@link http://www.studygroup.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('NO_OUTPUT_BUFFERING', true);

require_once('../../../config.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->libdir.'/adminlib.php');

admin_externalpage_setup('toolrebuildcoursecache');

$sure = optional_param('sure', 0, PARAM_BOOL);
$specifyids = optional_param('specifyids', '', PARAM_NOTAGS);

###################################################################
echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('pageheader', 'tool_rebuildcoursecache'));

if (!data_submitted() or !confirm_sesskey() or !$sure) {   /// Print a form
    echo $OUTPUT->box_start();
    echo '<div class="mdl-align">';
    echo '<form action="index.php" method="post"><div>';
    echo '<input type="hidden" name="sesskey" value="'.sesskey().'" />';
    echo '<div>'.get_string('disclaimer', 'tool_rebuildcoursecache').'<br /><br />';
    echo '<div><label for="specifyids">'.get_string('specifyids', 'tool_rebuildcoursecache').'</label><br /><input type="text" id="specifyids" name="specifyids" value="" size="30" /></div><br />';    
    echo '<label for="sure">'.get_string('areyousure', 'tool_rebuildcoursecache').' </label><input type="checkbox" id="sure" name="sure" value="1" /></div>';
    echo '<div class="buttons"><input type="submit" class="singlebutton" value="Rebuild" /></div>';
    echo '</div></form>';
    echo '</div>';
    echo $OUTPUT->box_end();
    echo $OUTPUT->footer();
    die;
}

/// Rebuild course cache
echo $OUTPUT->notification(get_string('notifyrebuilding', 'tool_rebuildcoursecache'), 'notifysuccess');
if (empty($specifyids)) {
    rebuild_course_cache();
} else {
    echo $OUTPUT->box_start();
    $courseids = preg_split("/[\s,]+/", $specifyids);
    foreach ($courseids as $courseid) {
        if ($DB->record_exists('course', array('id'=>$courseid))) {
            rebuild_course_cache($courseid);
            echo get_string('success', 'tool_rebuildcoursecache', $courseid);
        } else {
            echo get_string('fail', 'tool_rebuildcoursecache', $courseid);
        }
    }
    echo $OUTPUT->box_end();
}
echo $OUTPUT->notification(get_string('notifyfinished', 'tool_rebuildcoursecache'), 'notifysuccess');

echo $OUTPUT->continue_button(new moodle_url('/admin/tool/rebuildcoursecache/index.php'));

echo $OUTPUT->footer();


