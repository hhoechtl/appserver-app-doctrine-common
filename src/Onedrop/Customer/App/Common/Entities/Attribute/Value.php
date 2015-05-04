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
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="attribute_value")
 */
class Value extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $title
	 * @Column(name="title", type="string", nullable=false)
	 */
	protected $title;

	/**
	 * @var int $attributeId
	 * @Column(name="attribute_id", type="integer", nullable=false)
	 */
	protected $attributeId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Attribute\Attribute $attribute
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Attribute", inversedBy="values", cascade={"persist"})
	 * @JoinColumn(name="attribute_id", referencedColumnName="id")
	 */
	protected $attribute;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return int
	 */
	public function getAttributeId() {
		return $this->attributeId;
	}

	/**
	 * @param int $attributeId
	 */
	public function setAttributeId($attributeId) {
		$this->attributeId = $attributeId;
	}

	/**
	 * @return Attribute
	 */
	public function getAttribute() {
		return $this->attribute;
	}

	/**
	 * @param Attribute $attribute
	 */
	public function setAttribute($attribute) {
		$this->attribute = $attribute;
	}
}