<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Admin
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Admin;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="admin_user")
 */
class User extends AbstractEntity {

	const ROLE_ADMIN = 'admin';
	const ROLE_STYLIST = 'stylist';
	const ROLE_LIMITED = 'limited';
	private $roleArray = [self::ROLE_ADMIN, self::ROLE_STYLIST, self::ROLE_LIMITED];

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $sessionId
	 * @Column(name="session_id", type="string", nullable=false)
	 */
	protected $sessionId;

	/**
	 * @var string $name
	 * @Column(name="name", type="string", nullable=false)
	 */
	protected $name;

	/**
	 * @var string $email
	 * @Column(name="email", type="string", nullable=false)
	 */
	protected $email;

	/**
	 * @var string $password
	 * @Column(name="password", type="string", nullable=false)
	 */
	protected $password;

	/**
	 * @var string $role
	 * @Column(name="role", type="string")
	 */
	protected $role;

	/**
	 * @var integer $stylistId
	 * @Column(name="stylist_id", type="integer", nullable=true)
	 */
	protected $stylistId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Stylecard\Stylist
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Stylist")
	 * @JoinColumn(name="stylist_id", referencedColumnName="id")
	 */
	protected $stylist;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getSessionId() {
		return $this->sessionId;
	}

	/**
	 * @param string $sessionId
	 */
	public function setSessionId($sessionId) {
		$this->sessionId = $sessionId;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * @param string $role
	 */
	public function setRole($role) {
		if (!in_array($role, $this->roleArray)) {
			throw new \InvalidArgumentException("Invalid role");
		}

		$this->role = $role;
	}

	/**
	 * @return int
	 */
	public function getStylistId() {
		return $this->stylistId;
	}

	/**
	 * @param int $stylistId
	 */
	public function setStylistId($stylistId) {
		$this->stylistId = $stylistId;
	}

	/**
	 * @return \Onedrop\Customer\App\Common\Entities\Stylecard\Stylist
	 */
	public function getStylist() {
		return $this->stylist;
	}

	/**
	 * @param \Onedrop\Customer\App\Common\Entities\Stylecard\Stylist $stylist
	 */
	public function setStylist($stylist) {
		$this->stylist = $stylist;
	}

}