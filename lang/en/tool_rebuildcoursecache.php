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
 * Strings for component 'tool_rebuildcoursecache', language 'en'
 *
 * @package    tool
 * @subpackage rebuildcoursecache
 * @copyright  2013 Alex Rowe {@link http://www.studygroup.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Rebuild Course Cache';
$string['pageheader'] = 'Rebuild Course Cache';
$string['disclaimer'] = 'This tool will Rebuild the Course Cache (modinfo and sectioncache) for all courses on your site.<br />This can take a long time on large sites so you may want to do this during the night or downtime.';
$string['areyousure'] = 'Are you sure you want to continue?';
$string['notifyrebuilding'] = 'Starting to Rebuild the Course Cache';
$string['notifyfinished'] = 'Course cache has been rebuilt';
$string['specifyids'] = 'Leave this text box empty to rebuild all courses or specify which individual course ids will be rebuilt (Comma or Space separated)<br />Example: 1,2,30,100 or 1 2 30 100';
$string['success'] = 'SUCCESS - Course ID: {$a} <br />';
$string['fail'] = 'FAIL - Could not find Course ID: {$a} <br />';