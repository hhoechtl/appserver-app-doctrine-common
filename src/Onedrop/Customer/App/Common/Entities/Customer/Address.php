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
 * @Table(name="customer_address")
 */
class Address extends AbstractEntity {

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
	 * @var string $company
	 * @Column(name="company", type="string", nullable=false)
	 */
	protected $company = '';

	/**
	 * @var string $salutation
	 * @Column(name="salutation", type="string", nullable=false)
	 */
	protected $salutation = '';

	/**
	 * @var string $firstName
	 * @Column(name="first_name", type="string", nullable=false)
	 */
	protected $firstName = '';

	/**
	 * @var string $lastName
	 * @Column(name="last_name", type="string", nullable=false)
	 */
	protected $lastName = '';

	/**
	 * @var string $street
	 * @Column(name="street", type="string", nullable=false)
	 */
	protected $street = '';

	/**
	 * @var string $streetNumber
	 * @Column(name="street_number", type="string", nullable=false)
	 */
	protected $streetNumber = '';

	/**
	 * @var string $additionalAddress
	 * @Column(name="additional_address", type="string", nullable=false)
	 */
	protected $additionalAddress = '';

	/**
	 * @var string $zipCode
	 * @Column(name="zip_code", type="string", nullable=false)
	 */
	protected $zipCode = '';

	/**
	 * @var string $city
	 * @Column(name="city", type="string", nullable=false)
	 */
	protected $city = '';

	/**
	 * @var int $countryId
	 * @Column(name="country_id", type="integer", nullable=false)
	 */
	protected $countryId = 0;

	/**
	 * @var string $phone
	 * @Column(name="phone", type="string", nullable=false)
	 */
	protected $phone = '';

	/**
	 * @var int $billing
	 * @Column(name="billing", type="integer", nullable=false)
	 */
	protected $billing = 0;

	/**
	 * @var int $shipping
	 * @Column(name="shipping", type="integer", nullable=false)
	 */
	protected $shipping = 0;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Customer\Customer
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Customer\Customer", inversedBy="addresses")
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
	 * @return string
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param string $company
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * @return string
	 */
	public function getSalutation() {
		return $this->salutation;
	}

	/**
	 * @param string $salutation
	 */
	public function setSalutation($salutation) {
		$this->salutation = $salutation;
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
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @param string $street
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * @return string
	 */
	public function getStreetNumber() {
		return $this->streetNumber;
	}

	/**
	 * @param string $streetNumber
	 */
	public function setStreetNumber($streetNumber) {
		$this->streetNumber = $streetNumber;
	}

	/**
	 * @return string
	 */
	public function getAdditionalAddress() {
		return $this->additionalAddress;
	}

	/**
	 * @param string $additionalAddress
	 */
	public function setAdditionalAddress($additionalAddress) {
		$this->additionalAddress = $additionalAddress;
	}

	/**
	 * @return string
	 */
	public function getZipCode() {
		return $this->zipCode;
	}

	/**
	 * @param string $zipCode
	 */
	public function setZipCode($zipCode) {
		$this->zipCode = $zipCode;
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param string $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return int
	 */
	public function getCountryId() {
		return $this->countryId;
	}

	/**
	 * @param int $countryId
	 */
	public function setCountryId($countryId) {
		$this->countryId = $countryId;
	}

	/**
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @return int
	 */
	public function getBilling() {
		return $this->billing;
	}

	/**
	 * @param int $billing
	 */
	public function setBilling($billing) {
		$this->billing = $billing;
	}

	/**
	 * @return int
	 */
	public function getShipping() {
		return $this->shipping;
	}

	/**
	 * @param int $shipping
	 */
	public function setShipping($shipping) {
		$this->shipping = $shipping;
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