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
 * @Table(name="produc_image")
 */
class ProductImage extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var int $productId
	 * @Column(name="product_id", type="int", nullable=false)
	 */
	protected $productId;

	/**
	 * @var string $title
	 * @Column(name="title", type="string", nullable=false)
	 */
	protected $title;

	/**
	 * @var string $filename
	 * @Column(name="filename", type="string", nullable=false)
	 */
	protected $filename;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Product\Product $product
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Product\Product", inversedBy="images")
	 * @JoinColumn(name="product_id", referencedColumnName="id")
	 */
	protected $product;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getProductId() {
		return $this->productId;
	}

	/**
	 * @param mixed $productId
	 */
	public function setProductId($productId) {
		$this->productId = $productId;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * @param string $filename
	 */
	public function setFilename($filename) {
		$this->filename = $filename;
	}
}