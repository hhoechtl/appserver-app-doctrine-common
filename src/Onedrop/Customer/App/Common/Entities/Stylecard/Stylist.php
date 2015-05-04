<?php
/**
 * @category	Onedrop
 * @package		Onedrop\Customer\App\Common\Entities
 * @subpackage	Stylecard
 * @version		0.1
 * @author		Andreas Winter <awinter@1drop.de>
 * @copyright	Copyright (c) 2015 Onedrop Solutions GmbH & Co. KG (http://www.1drop.de)
 */

namespace Onedrop\Customer\App\Common\Entities\Stylecard;
use Doctrine\Common\Collections\ArrayCollection;
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="stylist")
 */
class Stylist extends AbstractEntity {

	/**
	 * @var int $id
	 * @Id
	 * @GeneratedValue(strategy="IDENTITY")
	 * @Column(name="id", type="integer", nullable=false)
	 */
	protected $id;

	/**
	 * @var string $name
	 * @Column(name="name", type="string", nullable=false)
	 */
	protected $name;

	/**
	 * @var string $image
	 * @Column(name="image", type="string", nullable=true)
	 */
	protected $image;

	/**
	 * INVERSE SIDE
	 * @var ArrayCollection $messages
	 * @OneToMany(targetEntity="Onedrop\Customer\App\Common\Entities\Message\Message", mappedBy="stylist")
	 */
	protected $messages;

	public function __construct() {
		$this->messages = new ArrayCollection();
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
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
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

}