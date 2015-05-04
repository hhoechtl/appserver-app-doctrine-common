<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Transaction
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Transaction;
use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="transaction")
 */
class Transaction extends AbstractEntity {

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
	 * @var int $customerId
	 * @Column(name="customer_id", type="integer", nullable=true)
	 */
	protected $customerId = null;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Customer\Customer
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Customer", inversedBy="carts")
	 * @JoinColumn(name="customer_id", referencedColumnName="id")
	 */
	protected $customer;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $items
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Transaction\TransactionItem", mappedBy="transaction", orphanRemoval=true, cascade={"persist"})
	 */
	protected $items;


	public function __construct() {
		$this->items = new ArrayCollection();
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
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
	 * @return int
	 */
	public function getCustomerId() {
		return $this->customerId;
	}

	/**
	 * @param int $customerId
	 */
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
	}

	/**
	 * @return \Onedrop\Customer\App\Common\Entities\Customer\Customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * @param \Onedrop\Customer\App\Common\Entities\Customer\Customer $customer
	 */
	public function setCustomer($customer) {
		$this->customer = $customer;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @param ArrayCollection $items
	 */
	public function setItems($items) {
		$this->items = $items;
	}
}