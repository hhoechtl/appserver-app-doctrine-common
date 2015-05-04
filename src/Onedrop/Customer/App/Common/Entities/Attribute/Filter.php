<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Attribute
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Attribute;
use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="attribute_filter")
 */
class Filter extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $operand
	 * @Column(name="operand", type="string", nullable=false)
	 */
	protected $operand;

	/**
	 * @var ArrayCollection $values
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Value")
	 * @JoinTable(name="filters_values",
	 *      joinColumns={@JoinColumn(name="filter_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="value_id", referencedColumnName="id")}
	 *      )
	 */
	protected $values;

	public function __construct() {
		$this->values = new ArrayCollection();
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
	public function getOperand() {
		return $this->operand;
	}

	/**
	 * @param string $operand
	 */
	public function setOperand($operand) {
		$this->operand = $operand;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getValues() {
		return $this->values;
	}

	/**
	 * @param ArrayCollection $values
	 */
	public function setValues($values) {
		$this->values = $values;
	}
}