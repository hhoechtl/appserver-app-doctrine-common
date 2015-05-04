<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Transaction
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Transaction;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="transaction_item")
 */
class TransactionItem extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var int $transactionId
	 * @Column(name="transaction_id", type="integer", nullable=false)
	 */
	protected $transactionId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Transaction\Transaction
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Transaction\Transaction", inversedBy="items")
	 * @JoinColumn(name="transaction_id", referencedColumnName="id")
	 */
	protected $transaction;

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
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * @param int $transactionId
	 */
	public function setTransactionId($transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * @return Transaction
	 */
	public function getTransaction() {
		return $this->transaction;
	}

	/**
	 * @param Transaction $transaction
	 */
	public function setTransaction($transaction) {
		$this->transaction = $transaction;
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