<?php
namespace proven\store\model;

class WarehouseProduct {
    
    private ?int $warehouseId;
    private ?int $productId;
    private ?int $stock;

    public function __construct(?int $warehouseId=null,?int $productId=null,?int $stock=null) {
        $this->warehouseId = $warehouseId;
        $this->productId = $productId;
        $this->stock = $stock;
    }

    public function getWarehouseid(): ?int {
        return $this->warehouseId;
    }

    public function getProductid(): ?int {
        return $this->productId;
    }

    public function getStock(): ?int {
        return $this->stock;
    }

    

    public function setId(?int $warehouseId): void {
        $this->warehouseId = $warehouseId;
    }

    public function setProductid(?int $productId): void {
        $this->productId = $productId;
    }

    public function setStock(?int $stock): void {
        $this->passstockword = $stock;
    }


    public function __toString() {
        return sprintf("WarehouseProducts{[warehouseId=%d][productId=%s][stock=%s]}",
                $this->warehouseId, $this->productId, $this->stock);
    }

}