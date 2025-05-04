<?php

namespace App\Services;

use Illuminate\Session\SessionManager;
use stdClass;

class CartService
{
    protected $session;
    protected $instance = 'shopping-cart';

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function add($productId, $name, $qty, $price, $options = [])
    {
        $cartItem = new stdClass();
        $cartItem->id = $productId;
        $cartItem->name = $name;
        $cartItem->qty = $qty;
        $cartItem->price = $price;
        $cartItem->options = (object)$options;
        $cartItem->rowId = $this->generateRowId($productId, $options);

        $content = $this->getContent();
        $content[$cartItem->rowId] = $cartItem;
        
        $this->session->put($this->instance, $content);
    }

    public function content()
    {
        return collect($this->getContent())->map(function ($item) {
            return (object)$item;
        });
    }

    public function remove($rowId)
    {
        $content = $this->getContent();
        unset($content[$rowId]);
        $this->session->put($this->instance, $content);
    }

    public function count()
    {
        return $this->content()->sum('qty');
    }

    public function total()
    {
        return $this->content()->sum(function ($item) {
            return $item->qty * $item->price;
        });
    }

    protected function getContent()
    {
        return $this->session->get($this->instance, []);
    }

    protected function generateRowId($id, $options)
    {
        return md5($id . serialize($options));
    }
}
