<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2009
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Omeka_Test
 **/

class InsertItemTypeTest extends PHPUnit_Framework_TestCase
{
    protected $_zendDbAdapter;
    
    public function setUp()
    {
        $this->_loadConfig();
        $this->_configDatabaseAdapter();
        $this->_buildDatabase();
    }
    
    public function testIsTesting()
    {
        
    }
        
    private function _buildDatabase()
    {
        $this->_loadSqlFile('refresh');
    }
    
    private function _loadSqlFile($sqlFilename)
    {
        $sqlDir = realpath( 
            __FILE__ . DIRECTORY_SEPARATOR . 
            '..' . DIRECTORY_SEPARATOR . '..' . 
            DIRECTORY_SEPARATOR . 'Sql');
        
        $sqlPath = $sqlDir . DIRECTORY_SEPARATOR . $sqlFilename . '.sql';
        $sql = file_get_contents($sqlPath);
        // Split it on ; (better way to do this?)
        $this->_execSqlBlock($sql);
    }
    
    /**
     * Copied from Omeka_Db::execBlock()
     */
    private function _execSqlBlock($sqlBlock)
    {
        $queries = explode(';', $sqlBlock);
        foreach ($queries as $query) {
            if (strlen(trim($query))) {
                $this->_zendDbAdapter->query($query);
            }
        }
    }
    
    private function _configDatabaseAdapter()
    {
        $config = Zend_Registry::get('test_config');

        $dbh = Zend_Db::factory('Mysqli', array(
            'host'     => $config->db->host,
            'username' => $config->db->username,
            'password' => $config->db->password,
            'dbname'   => $config->db->name
        	));
        
        $this->_zendDbAdapter = $dbh;
    }
    
    private function _loadConfig()
    {
        if (!Zend_Registry::isRegistered('test_config')) {
            //Config dependency
            $config = new Zend_Config_Ini(APP_DIR . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR.'config.ini', 'testing');
            Zend_Registry::set('test_config', $config);
        }
    }
}
