<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Product
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Product;

use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="product_variant")
 */
class ProductVariant extends AbstractEntity {

	/**
	 * @var integer $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var integer $parentId
	 * @Column(name="parent_id", type="integer", nullable=false)
	 */
	protected $parentId;

	/**
	 * @var integer $childId
	 * @Column(name="child_id", type="integer", nullable=false)
	 */
	protected $childId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Product\Product $parent
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Product\Product", inversedBy="parent")
	 * @JoinColumn(name="parent_id", referencedColumnName="id")
	 */
	protected $parent;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Product\Product $child
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Product\Product")
	 * @JoinColumn(name="child_id", referencedColumnName="id")
	 */
	protected $child;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getParentId() {
		return $this->parentId;
	}

	/**
	 * @param int $parentId
	 */
	public function setParentId($parentId) {
		$this->parentId = $parentId;
	}

	/**
	 * @return int
	 */
	public function getChildId() {
		return $this->childId;
	}

	/**
	 * @param int $childId
	 */
	public function setChildId($childId) {
		$this->childId = $childId;
	}

	/**
	 * @return int
	 */
	public function getAttributeValueId() {
		return $this->attributeValueId;
	}

	/**
	 * @param int $attributeValueId
	 */
	public function setAttributeValueId($attributeValueId) {
		$this->attributeValueId = $attributeValueId;
	}

	/**
	 * @return Product
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param Product $parent
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * @return Product
	 */
	public function getChild() {
		return $this->child;
	}

	/**
	 * @param Product $child
	 */
	public function setChild($child) {
		$this->child = $child;
	}
}