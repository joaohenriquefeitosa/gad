<?php 

/**
 * Conn.class [CONEXÃO]
 * Classe abstrata de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 *
 * @author João Henrique Feitosa
 */


class Conn{

	private static $Host = HOST;
	private static $User = USER;
	private static $Pass = PASS;
	private static $Dbsa = DBSA;

	/** @var PDO */
	private static $Connect = null;


	/**
	 * Conect com o banco de dados com o pattern SingleTon
	 * Retorna um objeto PDO;
	 */
	private static function Conectar(){
		try{
			if(self::$Connect == null):
				$dns = 'mysql:host='.self::$Host.';dbname='.self::$Dbsa;
				$options = [PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8'];
				self::$Connect = new PDO($dns, self::$User, self::$Pass, $options);
			endif;

		}catch(PDOException $e){
			PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
			die;
		}

		self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return self::$Connect;
	}

	/**
	 * Retorna um objeto PDO SingleTon Pattern.
	 */ 
	public static function getConn(){
		return self::Conectar();
	}
}

 ?>