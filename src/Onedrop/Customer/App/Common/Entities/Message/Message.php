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
 * @Table(name="message")
 */
class Message extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $text
	 * @Column(name="text", type="text", nullable=false)
	 */
	protected $text;

	/**
	 * @var int $stylistId
	 * @Column(name="stylist_id", type="integer", nullable=false)
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
	 * INVERSE SIDE
	 * @var ArrayCollection $messageRecipients
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Message\MessageRecipient", mappedBy="message")
	 */
	protected $messageRecipients;

	public function __construct() {
		$this->messageRecipients = new ArrayCollection();
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

	/**
	 * @return ArrayCollection
	 */
	public function getMessageRecipients() {
		return $this->messageRecipients;
	}

	/**
	 * @param ArrayCollection $messageRecipients
	 */
	public function setMessageRecipients($messageRecipients) {
		$this->messageRecipients = $messageRecipients;
	}
}