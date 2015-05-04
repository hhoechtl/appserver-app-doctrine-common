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
require_once(__DIR__.'/../AbstractEntity.php'); use Onedrop\Customer\App\Common\Entities\AbstractEntity;

/**
 * @Entity
 * @Table(name="stylecard")
 */
class Stylecard extends AbstractEntity {

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
	 * @var string $image
	 * @Column(name="image", type="string", nullable=true)
	 */
	protected $image;

	/**
	 * @var string $description
	 * @Column(name="description", type="text", nullable=true)
	 */
	protected $description;

	/**
	 * @var int $stylistId
	 * @Column(name="stylist_id", type="integer", nullable=false)
	 */
	protected $stylistId;

	/**
	 * @var int $layoutId
	 * @Column(name="layout_id", type="integer", nullable=false)
	 */
	protected $layoutId;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Stylecard\Stylist
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Stylist")
	 * @JoinColumn(name="stylist_id", referencedColumnName="id")
	 */
	protected $stylist;

	/**
	 * OWNING SIDE
	 * @var \Onedrop\Customer\App\Common\Entities\Stylecard\Layout
	 * @ManyToOne(targetEntity="Onedrop\Customer\App\Common\Entities\Stylecard\Layout")
	 * @JoinColumn(name="layout_id", referencedColumnName="id")
	 */
	protected $layout;

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
	 * @return int
	 */
	public function getStylistId() {
		return $this->stylistId;
	}

	/**
	 * @param int $stylistId
	 */
	public function setStylistId($stylistId) {
		$this->stylistId = $stylistId;
	}

	/**
	 * @return int
	 */
	public function getLayoutId() {
		return $this->layoutId;
	}

	/**
	 * @param int $layoutId
	 */
	public function setLayoutId($layoutId) {
		$this->layoutId = $layoutId;
	}

	/**
	 * @return Stylist
	 */
	public function getStylist() {
		return $this->stylist;
	}

	/**
	 * @param Stylist $stylist
	 */
	public function setStylist($stylist) {
		$this->stylist = $stylist;
	}

	/**
	 * @return Layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * @param Layout $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

}