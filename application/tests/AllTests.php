<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2007-2010
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Omeka
 */

/**
 * 
 *
 * @package Omeka
 * @copyright Center for History and New Media, 2007-2010
 */
class AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite();
        $suite->addTest(CoreTests::suite());
        $suite->addTest(PluginTests::suite());
        return $suite;
    }    
}
