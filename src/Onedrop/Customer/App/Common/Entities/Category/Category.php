<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Category
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Category;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @Entity(repositoryClass="CategoryRepository")
 * @Table(name="category")
 */
class Category extends AbstractEntity implements ORMBehaviors\Tree\NodeInterface, \ArrayAccess {

	use ORMBehaviors\Tree\Node;

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var integer $parentId
	 * @Column(name="parent", type="integer", nullable=true)
	 */
	protected $parentId;

	/**
	 * @var string $title
	 * @Column(name="title", type="string", nullable=false)
	 */
	protected $title;

	/**
	 * @var string $description
	 * @Column(name="description", type="text", nullable=false)
	 */
	protected $description;

	/**
	 * @var string $image
	 * @Column(name="image", type="string", nullable=false)
	 */
	protected $image;

	/**
	 * @var integer $sorting
	 * @Column(name="sorting", type="integer", nullable=true)
	 */
	protected $sorting;

	/**
	 * @var ArrayCollection $attributeValues
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Value")
	 * @JoinTable(name="categories_values",
	 *      joinColumns={@JoinColumn(name="category_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="value_id", referencedColumnName="id")}
	 *      )
	 */
	protected $attributeValues;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Category\Category $parent
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Category\Category", inversedBy="children", cascade={"persist"})
	 * @JoinColumn(name="parent", nullable=true, referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $parent;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $children
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Category\Category", mappedBy="parent", cascade={"all"}))
	 * @OrderBy({"sorting" = "ASC"})
	 */
	protected $children;

	/**
	 * @var ArrayCollection $products
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Product\Product", mappedBy="categories")
	 */
	protected $products;

	public function __construct() {
		$this->children = new ArrayCollection();
		$this->products = new ArrayCollection();
	}

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
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * @return int
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * @param int $sorting
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getAttributeValues() {
		return $this->attributeValues;
	}

	/**
	 * @param ArrayCollection $attributeValues
	 */
	public function setAttributeValues($attributeValues) {
		$this->attributeValues = $attributeValues;
	}

	/**
	 * @return Category
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param Category $parent
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * @param ArrayCollection $children
	 */
	public function setChildren($children) {
		$this->children = $children;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getProducts() {
		return $this->products;
	}

	/**
	 * @param ArrayCollection $products
	 */
	public function setProducts($products) {
		$this->products = $products;
	}
}