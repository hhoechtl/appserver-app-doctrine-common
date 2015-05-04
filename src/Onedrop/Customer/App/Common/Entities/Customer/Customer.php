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
use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="customer")
 */
class Customer extends AbstractEntity {

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
	 * @var string $firstName
	 * @Column(name="first_name", type="string", nullable=false)
	 */
	protected $firstName;

	/**
	 * @var string $firstName
	 * @Column(name="last_name", type="string", nullable=false)
	 */
	protected $lastName;

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
	 * @var int $newsletter
	 * @Column(name="newsletter", type="integer", nullable=false)
	 */
	protected $newsletter = 0;

	/**
	 * @var \DateTime $birthday
	 * @Column(name="birthday", type="date", nullable=true)
	 */
	protected $birthday;

	/**
	 * @var int $activated
	 * @Column(name="activated", type="integer", nullable=false)
	 */
	protected $activated = 1;

	/**
	 * @var int $stylistId
	 * @Column(name="stylist_id", type="integer", nullable=true)
	 */
	protected $stylistId;

	/**
	 * @var ArrayCollection $phonenumbers
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Phonenumber")
	 * * @JoinTable(name="customers_phonenumbers",
	 *      joinColumns={@JoinColumn(name="customer_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="phonenumber_id", referencedColumnName="id", unique=true)}
	 *      )
	 */
	protected $phonenumbers;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $addresses
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Address", mappedBy="customer", orphanRemoval=true, cascade={"persist"})
	 */
	protected $addresses;

	/**
	 * @var ArrayCollection $filters
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Filter")
	 * @JoinTable(name="customers_filters",
	 *      joinColumns={@JoinColumn(name="customer_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="filter_id", referencedColumnName="id")}
	 *      )
	 */
	protected $filters;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $carts
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Cart\Cart", mappedBy="customer")
	 */
	protected $carts;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $transactions
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Transaction\Transaction", mappedBy="customer")
	 */
	protected $transactions;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $commentHistory
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\CommentHistory", mappedBy="customer")
	 */
	protected $commentHistory;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $phoneHistory
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\PhoneHistory", mappedBy="customer")
	 */
	protected $phoneHistory;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Stylecard\Stylist
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Stylist")
	 * @JoinColumn(name="stylist_id", referencedColumnName="id")
	 */
	protected $stylist;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $messageRecipient
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Message\MessageRecipient", mappedBy="customer")
	 */
	protected $messageRecipient;

	public function __construct() {
		$this->phonenumbers = new ArrayCollection();
		$this->addresses = new ArrayCollection();
		$this->phoneHistory = new ArrayCollection();
		$this->commentHistory = new ArrayCollection();
		$this->filters = new ArrayCollection();
		$this->carts = new ArrayCollection();
		$this->transactions = new ArrayCollection();
		$this->messageRecipient = new ArrayCollection();
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
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
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
	 * @param string $password
	 */
	public function hashPassword($password) {
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	/**
	 * @return int
	 */
	public function getNewsletter() {
		return $this->newsletter;
	}

	/**
	 * @param int $newsletter
	 */
	public function setNewsletter($newsletter) {
		$this->newsletter = $newsletter;
	}

	/**
	 * @return \DateTime
	 */
	public function getBirthday() {
		return $this->birthday;
	}

	/**
	 * @param \DateTime $birthday
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	/**
	 * @return int
	 */
	public function getActivated() {
		return $this->activated;
	}

	/**
	 * @param int $activated
	 */
	public function setActivated($activated) {
		$this->activated = $activated;
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
	 * @return ArrayCollection
	 */
	public function getPhonenumbers() {
		return $this->phonenumbers;
	}

	/**
	 * @param ArrayCollection $phonenumbers
	 */
	public function setPhonenumbers($phonenumbers) {
		$this->phonenumbers = $phonenumbers;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getAddresses() {
		return $this->addresses;
	}

	/**
	 * @param ArrayCollection $addresses
	 */
	public function setAddresses($addresses) {
		$this->addresses = $addresses;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getFilters() {
		return $this->filters;
	}

	/**
	 * @param ArrayCollection $filters
	 */
	public function setFilters($filters) {
		$this->filters = $filters;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getCarts() {
		return $this->carts;
	}

	/**
	 * @param ArrayCollection $carts
	 */
	public function setCarts($carts) {
		$this->carts = $carts;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getTransactions() {
		return $this->transactions;
	}

	/**
	 * @param ArrayCollection $transactions
	 */
	public function setTransactions($transactions) {
		$this->transactions = $transactions;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getCommentHistory() {
		return $this->commentHistory;
	}

	/**
	 * @param ArrayCollection $commentHistory
	 */
	public function setCommentHistory($commentHistory) {
		$this->commentHistory = $commentHistory;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getPhoneHistory() {
		return $this->phoneHistory;
	}

	/**
	 * @param ArrayCollection $phoneHistory
	 */
	public function setPhoneHistory($phoneHistory) {
		$this->phoneHistory = $phoneHistory;
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
	public function getMessageRecipient() {
		return $this->messageRecipient;
	}

	/**
	 * @param ArrayCollection $messageRecipient
	 */
	public function setMessageRecipient($messageRecipient) {
		$this->messageRecipient = $messageRecipient;
	}
}
