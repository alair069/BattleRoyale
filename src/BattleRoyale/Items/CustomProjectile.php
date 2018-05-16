<?php  

namespace BattleRoyale\Items;

use pocketmine\Player;
use pocketmine\entity\projectile\Projectile;
use pocketmine\network\mcpe\protocol\AddEntityPacket;

abstract class CustomProjectile extends Projectile {

	public $gravity = 0.1;
	public $drag = 0.25;
	public $width = 0.25;
	public $height = 0.25;
	public $weight = 0.25;
	public $lenght = 0.25;

	public function initEntity(){
		parent::initEntity();
	}

	public function saveNBT(){
		parent::saveNBT();
	}

	public function spawnTo(Player $player){
		$packet = new AddEntityPacket();
		$packet->type = static::NETWORK_ID;
		$packet->mation = $this->getMotion();
		$packet->position = $this->asVector3();
		$packet->entityRuntimeId = $this->getId();
		$packet->pitch = $this->pitch;
		$packet->yaw = $this->yaw;
		$packet->metadata = $this->getDataPropertyManager()->getAll();
		$player->dataPacket($packet);
		parent::spawnTo($player);
	}

}