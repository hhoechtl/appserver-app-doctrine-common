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
 * @Table(name="product")
 */
class Product extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $productNumber
	 * @Column(name="product_number", type="string", nullable=false)
	 */
	protected $productNumber;

	/**
	 * @var float $salesPrice
	 * @Column(name="sales_price", type="float", nullable=false)
	 */
	protected $salesPrice;

	/**
	 * @var float $steadPrice
	 * @Column(name="stead_price", type="float", nullable=false)
	 */
	protected $steadPrice;

	/**
	 * @var ArrayCollection $attributeValues
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Attribute\Value")
	 * @JoinTable(name="products_values",
	 *      joinColumns={@JoinColumn(name="product_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="value_id", referencedColumnName="id")}
	 *      )
	 */
	protected $attributeValues;

	/**
	 * @var ArrayCollection $categories
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Category\Category", inversedBy="products")
	 * @JoinTable(name="products_categories")
	 */
	protected $categories;

	/**
	 * @var ArrayCollection $styles
	 * @ManyToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Category\Style", inversedBy="products")
	 * @JoinTable(name="products_styles")
	 */
	protected $styles;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $variants
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Product\ProductVariant", mappedBy="parent")
	 */
	protected $variants;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $images
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Product\ProductImage", mappedBy="product")
	 */
	protected $images;

	public function __construct() {
		$this->attributeValues = new ArrayCollection();
		$this->categories = new ArrayCollection();
		$this->styles = new ArrayCollection();
		$this->variants = new ArrayCollection();
		$this->images = new ArrayCollection();
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
	public function getProductNumber() {
		return $this->productNumber;
	}

	/**
	 * @param string $productNumber
	 */
	public function setProductNumber($productNumber) {
		$this->productNumber = $productNumber;
	}

	/**
	 * @return float
	 */
	public function getSalesPrice() {
		return $this->salesPrice;
	}

	/**
	 * @param float $salesPrice
	 */
	public function setSalesPrice($salesPrice) {
		$this->salesPrice = $salesPrice;
	}

	/**
	 * @return float
	 */
	public function getSteadPrice() {
		return $this->steadPrice;
	}

	/**
	 * @param float $steadPrice
	 */
	public function setSteadPrice($steadPrice) {
		$this->steadPrice = $steadPrice;
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
	 * @return ArrayCollection
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @param ArrayCollection $categories
	 */
	public function setCategories($categories) {
		$this->categories = $categories;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getStyles() {
		return $this->styles;
	}

	/**
	 * @param ArrayCollection $styles
	 */
	public function setStyles($styles) {
		$this->styles = $styles;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getVariants() {
		return $this->variants;
	}

	/**
	 * @param ArrayCollection $variants
	 */
	public function setVariants($variants) {
		$this->variants = $variants;
	}
}