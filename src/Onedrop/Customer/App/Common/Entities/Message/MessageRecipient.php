<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Product
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Message;

use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="message_recipient")
 */
class MessageRecipient extends AbstractEntity {

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
	 * @var int $messageId
	 * @Column(name="message_id", type="integer", nullable=false)
	 */
	protected $messageId;

	/**
	 * @var int $read
	 * @Column(name="read", type="integer", nullable=false)
	 */
	protected $read;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Message\Message
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Message\Message")
	 * @JoinColumn(name="message_id", referencedColumnName="id")
	 */
	protected $message;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Customer\Customer
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Customer")
	 * @JoinColumn(name="customer_id", referencedColumnName="id")
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
	 * @return int
	 */
	public function getMessageId() {
		return $this->messageId;
	}

	/**
	 * @param int $messageId
	 */
	public function setMessageId($messageId) {
		$this->messageId = $messageId;
	}

	/**
	 * @return int
	 */
	public function getRead() {
		return $this->read;
	}

	/**
	 * @param int $read
	 */
	public function setRead($read) {
		$this->read = $read;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage($message) {
		$this->message = $message;
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

}