<?php

namespace Ticket;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;
use MixCoinSystem\MixCoinSystem;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info("Ticketを読み込みました");
		if(!file_exists($this->getDataFolder())){
			mkdir($this->getDataFolder(), 0744, true);
		}
		$this->sign1 = new Config($this->getDataFolder() ."sign1.yml", Config::YAML);
		$this->sign2 = new Config($this->getDataFolder() ."sign2.yml", Config::YAML);
		$this->sign3 = new Config($this->getDataFolder() ."sign3.yml", Config::YAML);
		$this->field1 = new Config($this->getDataFolder() ."field1.yml", Config::YAML);
		$this->field2 = new Config($this->getDataFolder() ."field2.yml", Config::YAML);
		$this->field3 = new Config($this->getDataFolder() ."field3.yml", Config::YAML);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "ticket":
			$coinsystem = MixCoinSystem::getInstance();
			if($sender instanceof Player){
			    if(!isset($args[0])){
			        $sender->sendMessage("§e§l〜チケット一覧〜");
			        $sender->sendMessage("看板チケット1  コイン500枚  (sign1)");
			        $sender->sendMessage("看板チケット2  コイン1000枚  (sign2)");
			        $sender->sendMessage("看板チケット3  コイン1500枚  (sign3)");
			        $sender->sendMessage("畑チケット1  コイン500枚  (field1)");
			        $sender->sendMessage("畑チケット2  コイン1000枚  (field2)");
			        $sender->sendMessage("畑チケット3  コイン1500枚  (field3)");
			        }else{
			            switch($args[0]){
			                case "sign1":
			                $name = $sender->getName();
			                if($this->sign1->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c看板チケット1は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 500){
			                        $this->sign1->set($name,count($this->sign1->getAll())+1);
			                        $this->sign1->save();
			                        $this->sign1->reload();
			                        $coinsystem->MinusCoin($name,500);
			                        $sender->sendMessage("§a【運営】 §f看板チケット1を500コインで購入しました");
			                    }else{
			                        $sender->sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			                case "sign2":
			                $name = $sender->getName();
			                if($this->sign2->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c看板チケット2は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 1000){
			                        $this->sign2->set($name,count($this->sign2->getAll())+1);
			                        $this->sign2->save();
			                        $this->sign2->reload();
			                        $coinsystem->MinusCoin($name,1000);
			                        $sender->sendMessage("§a【運営】 §f看板チケット2を1000コインで購入しました");
			                    }else{
			                        $sender->sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			                case "sign3":
			                $name = $sender->getName();
			                if($this->sign3->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c看板チケット3は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 1500){
			                        $this->sign3->set($name,count($this->sign3->getAll())+1);
			                        $this->sign3->save();
			                        $this->sign3->reload();
			                        $coinsystem->MinusCoin($name,1500);
			                        $sender->sendMessage("§a【運営】 §f看板チケット3を1500コインで購入しました");
			                    }else{
			                        $sender->sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			                case "field1":
			                $name = $sender->getName();
			                if($this->field1->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c畑チケット1は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 500){
			                        $this->field1->set($name,count($this->field1->getAll())+1);
			                        $this->field1->save();
			                        $this->field1->reload();
			                        $coinsystem->MinusCoin($name,500);
			                        $sender->sendMessage("§a【運営】 §f畑チケット1を500コインで購入しました");
			                    }else{
			                        $sender->$sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			                case "field2":
			                $name = $sender->getName();
			                if($this->field2->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c畑チケット2は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 1000){
			                        $this->field2->set($name,count($this->field2->getAll())+1);
			                        $this->field2->save();
			                        $this->field2->reload();
			                        $coinsystem->MinusCoin($name,1000);
			                        $sender->sendMessage("§a【運営】 §f畑チケット2を1000コインで購入しました");
			                    }else{
			                        $sender->sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			                case "field3":
			                $name = $sender->getName();
			                if($this->field2->exists($name)){
			                    $sender->sendMessage("§a【運営】 §c畑チケット3は既に購入済みです");
			                }else{
			                    if($coinsystem->GetCoin($name) >= 1500){
			                        $this->field3->set($name,count($this->field3->getAll())+1);
			                        $this->field3->save();
			                        $this->field3->reload();
			                        $coinsystem->MinusCoin($name,1500);
			                        $sender->sendMessage("§a【運営】 §f畑チケット3を1500コインで購入しました");
			                    }else{
			                        $sender->sendMessage("§a【運営】 §c所有コインが不足しています");
			                    }
			                }
			                return true;
			                
			            }
			        }
			    }
                        return true;
			    
			case "delticket":
			$coinsystem = MixCoinSystem::getInstance();
			if($sender instanceof Player){
			    if(!isset($args[0])){
			        $sender->sendMessage("§e§l〜チケット一覧〜 (売却価格)");
			        $sender->sendMessage("看板チケット1  コイン250枚  (sign1)");
			        $sender->sendMessage("看板チケット2  コイン500枚  (sign2)");
			        $sender->sendMessage("看板チケット3  コイン750枚  (sign3)");
			        $sender->sendMessage("畑チケット1  コイン250枚  (field1)");
			        $sender->sendMessage("畑チケット2  コイン500枚  (field2)");
			        $sender->sendMessage("畑チケット3  コイン750枚  (field3)");
			        }else{
			            switch($args[0]){
			                case "sign1":
			                $name = $sender->getName();
			                if($this->sign1->exists($name)){
			                    $this->sign1->remove($name);
			                    $this->sign1->save();
			                    $this->sign1->reload();
			                    $coinsystem->PlusCoin($name,250);
			                    $sender->sendMessage("§a【運営】 §f看板チケット1を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c看板チケット1は未購入です");
			                }
			                return true;
			                
			                case "sign2":
			                $name = $sender->getName();
			                if($this->sign2->exists($name)){
			                    $this->sign2->remove($name);
			                    $this->sign2->save();
			                    $this->sign2->reload();
			                    $coinsystem->PlusCoin($name,500);
			                    $sender->sendMessage("§a【運営】 §f看板チケット2を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c看板チケット2は未購入です");
			                }
			                return true;
			                
			                case "sign3":
			                $name = $sender->getName();
			                if($this->sign3->exists($name)){
			                    $this->sign3->remove($name);
			                    $this->sign3->save();
			                    $this->sign3->reload();
			                    $coinsystem->PlusCoin($name,750);
			                    $sender->sendMessage("§a【運営】 §f看板チケット3を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c看板チケット3は未購入です");
			                }
			                return true;
			                
			                case "field1":
			                $name = $sender->getName();
			                if($this->field1->exists($name)){
			                    $this->field1->remove($name);
			                    $this->field1->save();
			                    $this->field1->reload();
			                    $coinsystem->PlusCoin($name,250);
			                    $sender->sendMessage("§a【運営】 §f畑チケット1を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c畑チケット1は未購入です");
			                }
			                return true;
			                
			                case "field2":
			                $name = $sender->getName();
			                if($this->field2->exists($name)){
			                    $this->field2->remove($name);
			                    $this->field2->save();
			                    $this->field2->reload();
			                    $coinsystem->PlusCoin($name,500);
			                    $sender->sendMessage("§a【運営】 §f畑チケット2を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c畑チケット2は未購入です");
			                }
			                return true;
			                
			                case "field3":
			                $name = $sender->getName();
			                if($this->field2->exists($name)){
			                    $this->field3->remove($name);
			                    $this->field3->save();
			                    $this->field3->reload();
			                    $coinsystem->PlusCoin($name,750);
			                    $sender->sendMessage("§a【運営】 §f畑チケット3を売却しました");
			                }else{
			                    $sender->sendMessage("§a【運営】 §c畑チケット3は未購入です");
			                }
			                return true;
			                
			            }
			        }
			    }
                        return true;

			case "tickets":
			if($sender instanceof Player){
			    if(!isset($args[0])){
			        }else{
			            switch($args[0]){
			                 case "sign1":
			                 $sender->sendMessage("§e§l看板チケット1 購入者");
			                 foreach($this->sign1->getAll() as $key=>$value){//sign1にある全ての$keyを取得
			                     $sender->sendMessage("{$key}");//購入者の名前を表示 ($keyから)
			                 }
			                 break;
			                 
			                 case "sign2":
			                 $sender->sendMessage("§e§l看板チケット2 購入者");
			                 foreach($this->sign2->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
			                 
			                 case "sign3":
			                 $sender->sendMessage("§e§l看板チケット3 購入者");
			                 foreach($this->sign3->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
			                 
			                 case "field1":
			                 $sender->sendMessage("§e§l畑チケット1 購入者");
			                 foreach($this->field1->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
			                 
			                 case "field2":
			                 $sender->sendMessage("§e§l畑チケット2 購入者");
			                 foreach($this->field2->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
			                 
			                 case "field3":
			                 $sender->sendMessage("§e§l畑チケット3 購入者");
			                 foreach($this->field3->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
			                 
			                 case "all":
			                 $sender->sendMessage("§e§l看板チケット1 購入者");
			                 foreach($this->sign1->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 $sender->sendMessage("§e§l看板チケット2 購入者");
			                 foreach($this->sign2->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 $sender->sendMessage("§e§l看板チケット3 購入者");
			                 foreach($this->sign3->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 $sender->sendMessage("§e§l畑チケット1 購入者");
			                 foreach($this->field1->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 $sender->sendMessage("§e§l畑チケット2 購入者");
			                 foreach($this->field2->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 $sender->sendMessage("§e§l畑チケット3 購入者");
			                 foreach($this->field3->getAll() as $key=>$value){
			                     $sender->sendMessage("{$key}");
			                 }
			                 break;
						    
					 case "check":
				         if(!isset($args[1])){
						 $sender->sendMessage("use: /tickets check <名前>");
					 }else{
						 if($this->sign1->exists($args[1])){
							 $sender->sendMessage("§e>>看板チケット1 購入済");
						 }
						 if($this->sign2->exists($args[1])){
							 $sender->sendMessage("§e>>看板チケット2 購入済");
						 }
						 if($this->sign3->exists($args[1])){
							 $sender->sendMessage("§e>>看板チケット3 購入済");
						 }
						 if($this->field1->exists($args[1])){
							 $sender->sendMessage("§e>>畑チケット1 購入済");
						 }
						 if($this->field2->exists($args[1])){
							 $sender->sendMessage("§e>>畑チケット2 購入済");
						 }
						 if($this->field3->exists($args[1])){
							 $sender->sendMesaage("§e>>畑チケット3 購入済");
						 }
						 if(!$this->sign1->exists($args[1]) && !$this->sign2->exists($args[1]) && !$this->sign3->exists($args[1]) && !$this->field1->exists($args[1]) && !$this->field2->exists($args[1]) && !$this->field3->exists($args[1])){
							 $sender->sendMessage("§e>>{$args[1]}はチケットを所有していません");
						 }
					 }
				         return true;
			            }
			    }
			}
			return true;
		}
	}
}
