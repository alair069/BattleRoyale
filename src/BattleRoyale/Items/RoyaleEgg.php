<?php  

namespace BattleRoyale\Items;

use pocketmine\item\Egg;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Entity;
use BattleRoyale\EntityManager;

class RoyaleEgg extends Egg {

	public function throwEgg(Player $player){
	  $egg = Entity::createEntity("EggLauncher", $player->getLevel(), EntityManager::getCompoundMotion($player), $player);
  	  $egg->setMotion($egg->getMotion()->multiply(6));
  	  $egg->spawnToAll();
  	  $this->count--;
      $player->getInventory()->setItemInHand($this->count > 0 ? clone $this : Item::get(Item::AIR, 0));
	}
}