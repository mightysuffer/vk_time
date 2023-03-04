<?php
class User {
    private $id;
    private $name;
    private $email;
    private $address;
    private $city;

    public function __construct($id, $name, $email, $address, $city) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }
}

class Item {
    private $id;
    private $name;
    private $image;
    private $price;
    private $quantity;
    private $properties;

    public function __construct(int $id, string $name, string $image, float $price, int $quantity, array $properties) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->properties = $properties;
    }

    public function getId() {
        // Получение ID товара
    }

    public function getName() {
        // Получение названия товара
    }

    public function getImage() {
        // Получение изображения товара
    }

    public function getPrice() {
        // Получение цены товара
    }

    public function getQuantity() {
        // Получение количества товара
    }

    public function getProperties() {
        // Получение дополнительных свойств товара
    }
}

class Cart {
    private $items;

    public function __construct() {
        $this->items = array();
    }

    public function addItem($item) {
        // добавление товара в корзину
    }

    public function removeItem($itemId) {
        // удаление товара из корзины по его идентификатору
    }

    public function updateItemQuantity($itemId, $newQuantity) {
        // изменение количества товара в корзине по его идентификатору
    }

    public function getTotalPrice() {
        // получение общей стоимости товаров в корзине
    }

    public function getItems() {
        return $this->items;
    }
}

class Order
{
    private $id;
    private $user;
    private $cart;
    private $deliveryAddress;
    private $deliveryDate;
    public function __construct($id, $user, $cart, $deliveryAddress, $deliveryDate)
    {
        $this->id = $id;
        $this->user = $user;
        $this->cart = $cart;
        $this->deliveryAddress = $deliveryAddress;
        $this->deliveryDate = $deliveryDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addItem(Item $item, int $quantity) {
        // Добавление товара в заказ
    }
    public function removeItem(Item $item, int $quantity) {
        // Удаление товара из заказа
    }
    public function TotalPrice() {
        // Расчет общей стоимости заказа
    }
    public function submit() {
        // Оформление заказа
    }
}

class City
{
    private $id;
    private $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {

    }

    public function getName()
    {

    }
}