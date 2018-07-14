<?php
/**
 * Database handling for CruzerMini App.
 *
 * PHP version 7.2
 * 
 * @category  PHP
 * @package   Core
 * @author    RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @copyright 2018 Cruzer Softwares
 * @license   https://github.com/CruzerSoftwares/CruzerMini/blob/master/licence.txt MIT License
 * @version   GIT: 1.0.0
 * @link      https://cruzersoftwares.github.io/CruzerMini/
 */

namespace Cruzer\Framework;

/**
 * This class handles database connection via user provided configuration
 * 
 * @category  PHP
 * @package   Core
 * @author    RN Kushwaha <Rn.kushwaha022@gmail.com>
 * @copyright 2018 Cruzer Softwares
 * @license   https://github.com/CruzerSoftwares/CruzerMini/blob/master/licence.txt MIT License
 * @version   Release: 1.0.0
 * @link      https://cruzersoftwares.github.io/CruzerMini/
 */

class Database {
	private $dbh;

	public function __construct(array $con = array()){
		try {
			switch($con['driver']){
				case "mysql": 
					$this->dbh = new \PDO(
									    "mysql:host=".$con['host'].";dbname=".$con['database'],
										$con['username'], 
										$con['password']
									);
					break;
				case "mysqlp": 
					$this->dbh = new \PDO(
										"mysql:host=".$con['host'].";dbname=".$con['database'],
										$con['username'],
										$con['password'],
										array(PDO::ATTR_PERSISTENT => true)
									);
					break;
				case "postgres": 
					$this->dbh = new \PDO(
									"pgsql:dbname=".$con['database'].";host=".$con['host'],
									$con['username'],
									$con['password']
								);
					break;
				case "sqlite": 
					$this->dbh = new \PDO("sqlite:".$con['dbpath']);
					break;
				case "sqlitememory": 
					$this->dbh = new \PDO("sqlite::memory");//to create tables in memory
					break;
				case "firebird": 
					$this->dbh = new \PDO(
							"firebird:dbname=".$con['host'].":".$con['dbpath'],
							"SYSDBA",
							"masterkey"
						);
					break;
				case "informix": 
					$this->dbh = new \PDO("informix:DSN=InformixDB", $con['username'], $con['password']);
					break;
				case "oracle": 
					$this->dbh = new \PDO("OCI:", $con['username'], $con['password']);
					break;
					//new \PDO("OCI:dbname=".$con['database'];charset=UTF-8", $con['username'], $con['password']);
				case "odbc": 
					$this->dbh = new \PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=C:\accounts.mdb;Uid=Admin");
					break;
				case "dblib": 
					$this->dbh = new \PDO (
										"dblib:host=".$con['host'].":".$port.";dbname=".$con['database'],
										$con['username'],
										$con['password']
									);
					break;
				case "ibm": 
					$this->dbh = new \PDO(
									"ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE=accounts; HOST=1.2.3,4;PORT=56789;PROTOCOL=TCPIP;",
									$con['username'],
									$con['password']
								);
					break;
			}

			$this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			// which tells PDO to disable emulated prepared statements and
			// use real prepared statements. This makes sure the statement
			// and the values aren't parsed by PHP before sending it to the MySQL server
			// (giving a possible attacker no chance to inject malicious SQL).
			$this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getConnection(){
		return new \FluentPDO($this->dbh);
	}
}
