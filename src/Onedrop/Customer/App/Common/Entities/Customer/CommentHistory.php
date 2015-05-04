<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Customer
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Customer;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="customer_history")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"comment" = "CommentHistory", "phone" = "PhoneHistory"})
 */
class CommentHistory extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var int $customerId
	 * @Column(name="customer_id", type="integer", nullable=false)
	 */
	protected $customerId;

	/**
	 * @var string $text
	 * @Column(name="text", type="text", nullable=false)
	 */
	protected $text;
	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Customer\Customer
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Customer")
	 * @JoinColumn(name="stylist_id", referencedColumnName="id")
	 */
	protected $customer;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
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
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @param string $text
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * @return Customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * @param Customer $customer
	 */
	public function setCustomer($customer) {
		$this->customer = $customer;
	}
}