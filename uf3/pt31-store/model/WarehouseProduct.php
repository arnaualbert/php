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


// class Warehouseproduct {

//     public function __construct(
//             private int $warehouse_id = 0,
//             private ?string $product_id,
//             private ?string $stock,
//     ) {
        
//     }

//     public function getWarehouse_id(): int {
//         return $this->warehouse_id;
//     }

//     public function getProduct_id(): ?int {
//         return $this->product_id;
//     }

//     public function getStock(): ?int {
//         return $this->stock;
//     }

//     public function setWarehouse_id(int $warehouse_id): void {
//         $this->warehouse_id = $warehouse_id;
//     }

//     public function setProduct_id(?int $product_id): void {
//         $this->product_id = $product_id;
//     }

//     public function setStock(?int $stock): void {
//         $this->stock = $stock;
//     }

//     public function __toString() {
//         return sprintf("Warehouse{[warehouse_id=%d][product_id=%s][stock=%s]}",
//                 $this->warehouse_id, $this->product_id, $this->stock);
//     }

// }