<?php

namespace NurAzli\ServerEconomyPlayerMoney;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class ServerEconomyPlayerMoney extends PluginBase implements Listener {

    /** @var self|null */
    private static $instance;

    private $playerBalances = [];

    public static function getInstance(): ?self {
        return self::$instance;
    }

    public function onLoad(): void {
        self::$instance = $this;
    }

    public function onEnable(): void {
        $this->getLogger()->info("ServerEconomyPlayerMoney has been enabled.");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        // Load saved player balances from storage (e.g., file or database)
        $this->loadBalancesFromStorage();
    }

    public function onDisable(): void {
        $this->getLogger()->info("ServerEconomyPlayerMoney has been disabled.");

        // Save player balances to storage (e.g., file or database)
        $this->saveBalancesToStorage();
    }

    public function getPlayerBalance(string $player): int {
        return isset($this->playerBalances[$player]) ? $this->playerBalances[$player] : 0;
    }

    public function setPlayerBalance(string $player, int $amount): void {
        $this->playerBalances[$player] = $amount;

        // Save player balances to storage (e.g., file or database)
        $this->saveBalancesToStorage();
    }

    private function loadBalancesFromStorage(): void {
    // Implement logic to load player balances from storage (e.g., file or database)
    $data = []; // Load data from storage (example)

    if (is_array($data) && !empty($data)) {
        foreach ($data as $player => $balance) {
            $this->playerBalances[$player] = $balance;
        }
    }
    }   
    
    private function saveBalancesToStorage(): void {
        // Implement logic to save player balances to storage (e.g., file or database)
        // Example: $data = $this->playerBalances;
        // Save $data to storage
    }

    // Add any other necessary functions for managing player balances
}
