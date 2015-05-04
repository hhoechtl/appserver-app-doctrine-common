<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Cart
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Cart;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="cart_item")
 */
class CartItem extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var int $cartId
	 * @Column(name="cart_id", type="integer", nullable=false)
	 */
	protected $cartId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Cart\Cart
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Cart\Cart", inversedBy="items")
	 * @JoinColumn(name="cart_id", referencedColumnName="id")
	 */
	protected $cart;

	/**
	 * @var int $productId
	 * @Column(name="product_id", type="integer", nullable=false)
	 */
	protected $productId;

	/**
	 * @var \Onedrop\Customer\App\Common\Entities\Product\Product $product
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Product\Product")
	 * @JoinColumn(name="product_id", referencedColumnName="id")
	 */
	protected $product;

	/**
	 * @var float $price
	 * @Column(name="price", type="float", nullable=false)
	 */
	protected $price;

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getCartId() {
		return $this->cartId;
	}

	/**
	 * @param int $cartId
	 */
	public function setCartId($cartId) {
		$this->cartId = $cartId;
	}

	/**
	 * @return Cart
	 */
	public function getCart() {
		return $this->cart;
	}

	/**
	 * @param Cart $cart
	 */
	public function setCart($cart) {
		$this->cart = $cart;
	}

	/**
	 * @return int
	 */
	public function getProductId() {
		return $this->productId;
	}

	/**
	 * @param int $productId
	 */
	public function setProductId($productId) {
		$this->productId = $productId;
	}

	/**
	 * @return \Onedrop\Customer\App\Common\Entities\Product\Product
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * @param \Onedrop\Customer\App\Common\Entities\Product\Product $product
	 */
	public function setProduct($product) {
		$this->product = $product;
	}

	/**
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param float $price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

}